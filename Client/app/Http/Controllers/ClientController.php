<?php
namespace App\Http\Controllers;

use App\Http\Requests\FormRequest;
use App\Services\JsonRpcClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * Cilent to make JsonRpc call
     * @var JsonRpcClient
     */
    protected $client;

    public function __construct(JsonRpcClient $client)
    {
        $this->client = $client;
    }

    /**
     * Show forms page
     * @return View
     */
    public function index ()
    {
        $data = $this->client->send('getAllPages', []);

        return view('index', ['result' => $data['result']]);
    }

    /**
     * Show result page after getting page info by page uid
     * @param FormRequest $request
     * @return View
     */
    public function show(FormRequest $request)
    {
        $data = $this->client->send('getPageById', [
            'page_uid' => $request->get('page_uid')
        ]);

        if (empty($data['result'])) {
            return Redirect::back()->withErrors(['errors' => 'Nothing to show']);
//            abort(404, 'Cannot find any result');
        }

        return view('page', ['result' => $data['result']]);
    }

    /**
     * Save page info or show already existed
     * @param FormRequest $request
     * @return View
     */
    public function store(FormRequest $request)
    {
        $data = $this->client->send('create', $request->all());

        if (isset($data['error'])) {
            if (!($errors = @json_decode($data['error'], true))) $errors = $data['error'];

            return Redirect::back()->withErrors($errors);
        }

        // if only one result wrapp it in array
        if (isset($data['result']['page_uid'])) $result = [$data['result']];
        else $result = $data['result'];

        return view('page', ['result' => $result]);
    }
}
