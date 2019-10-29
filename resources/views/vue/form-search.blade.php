<div class="search">
    <div class="container">
        <form>
            <div class="row">
                <div class="col pr-0">
                    <select class="form-control rounded-0 border-right-0" id="exampleFormControlSelect1">
                        <option>Choose Category</option>
                        <option v-for="category in categories" :key="category.id" v-bind:value="category.id"
                                v-text="category.name"></option>
                    </select>
                </div>
                <div class="col p-0">
                    <select class="form-control rounded-0 border-right-0 ">
                        <option>Choose Location</option>
                        <option v-for="location in locations" :key="location.id" v-bind:value="location.id"
                                v-text="location.name"></option>
                    </select>
                </div>
                <div class="col p-0">
                    <input type="text" class="form-control rounded-0" placeholder="What you are looking for...">
                </div>
                <div class="col pl-0 col-2">
                    <button class="btn btn-warning btn-block rounded-0">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{--End search section--}}