<form action="{{route('create-post')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{\Illuminate\Support\Facades\Session::token()}}">
    <input type="submit" value="Create Post">
    <div>
        <input type="text" name="name">
    </div>
    <div>
        <input type="text" name="price">
    </div>
    <div>
        <input type="text" name="description">
    </div>
    <div>
        <input type="text" name="location_name">
    </div>
    <div>
        <input type="text" name="sub_category_name">
    </div>
    <div>
        <input type="text" name="username">
    </div>
    <div>
        <input type="text" name="phone">
    </div>
    <input type="file" name="image[]" multiple>

</form>
