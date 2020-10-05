<div class="card-body">
    <h3> Get Page by Unique Id</h3>
    <form method="POST" action="/getPageById">
        @csrf
        <div class="form-group">
            <label for="page_uid">Page id</label>
            <input type="number" class="form-control" id="page_uid" name="page_uid">
        </div>
        <button type="submit" class="btn btn-primary">Get page</button>
    </form>
</div>
<h1 class="text-center">OR</h1>
<div class="card-body">
    <h3>Create new page</h3>
    <form method="POST" action="/store">
        @csrf
        <div class="form-group">
            <label for="page_uid">Page id</label>
            <input type="number" class="form-control" id="page_uid" name="page_uid" value="{{old('page_uid')}}">
        </div>
        <div class="form-group">
            <label for="title">Title of page</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label for="content">Content of page</label>
            <input type="text" class="form-control" id="content" name="content" value="{{old('content')}}">
        </div>
        <button type="submit" class="btn btn-primary">Save page</button>
    </form>
</div>

