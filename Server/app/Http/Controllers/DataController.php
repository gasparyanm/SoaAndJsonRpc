<?php

namespace App\Http\Controllers;

use App\Http\Response\JsonResponse;
use App\Page;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;

class DataController extends Controller
{
    /**
     * Return page by specific page_uid
     * @param array $params
     * @return mixed
     * @throws \Exception
     */
    public function getPageById(array $params)
    {
        $this->validate($params);

        return Page::where('page_uid', $params['page_uid'])
            ->get();
    }

    /**
     * Create new page row or return existed
     * @param array $params
     * @return mixed
     * @throws \Exception
     */
    public function create(array $params)
    {
        $page = Page::where('page_uid', $params['page_uid'])->get();
        if (!$page->isEmpty()) return $page;

        $this->validate($params, true);

        return Page::create($params);
    }

    /**
     * Return all pages ordered by page_uid keys
     * @return Page[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllPages()
    {
        return Page::all()->keyBy('page_uid');
    }

    /**
     * Validate post parameters
     * @param array $params
     * @param false $create
     * @return bool
     * @throws \Exception
     */
    private function validate(array $params, $create = false)
    {
        if ($create) {
            $validator = \Validator::make($params, [
                'page_uid' => 'required|unique:pages|int',
                'title' => 'required|min:5|max:155',
                'content' => 'required|min:5|max:155',
            ]);
        } else {
            $validator = \Validator::make($params, [
                'page_uid' => 'required|int'
                ]);
        }

        if( $validator->fails() ) {
            throw new \Exception($validator->messages());
        }
        return true;
    }
}
