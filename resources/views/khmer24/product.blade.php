@extends('crudbooster::admin_template')
@section('content')

    <div>

        @if(CRUDBooster::getCurrentMethod() != 'getProfile' && $button_cancel)
            @if(g('return_url'))
                <p><a title='Return' href='{{g("return_url")}}'><i class='fa fa-chevron-circle-left '></i>
                        &nbsp; {{trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}
                    </a></p>
            @else
                <p><a title='Main Module' href='{{CRUDBooster::mainpath()}}'><i class='fa fa-chevron-circle-left '></i>
                        &nbsp; {{trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}
                    </a></p>
            @endif
        @endif

        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><i class='{{CRUDBooster::getCurrentModule()->icon}}'></i> {!! $page_title or "Page Title" !!}
                </strong>
            </div>

            <div class="panel-body" style="padding:20px 0px 0px 0px">
                <?php
                $action = (@$row) ? CRUDBooster::mainpath("edit-save/$row->id") : CRUDBooster::mainpath("add-save");
                $return_url = ($return_url) ?: g('return_url');
                ?>
                <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data"
                      action='{{$action}}'>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type='hidden' name='return_url' value='{{ @$return_url }}'/>
                    <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
                    <input type='hidden' name='ref_parameter' value='{{urldecode(http_build_query(@$_GET))}}'/>
                    @if($hide_form)
                        <input type="hidden" name="hide_form" value='{!! serialize($hide_form) !!}'>
                    @endif
                    <div class="box-body" id="parent-form-area">

                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your product name">
                                </div>
                            </div> <!-- form-group // -->
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Price</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                            </div> <!-- form-group // -->
                            <div class="form-group">
                                <label for="about" class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div> <!-- form-group // -->
                            <div class="form-group">
                                <label for="qty" class="col-sm-3 control-label">QTY</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="qty" id="qty" placeholder="шт.">
                                </div>
                            </div> <!-- form-group // -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Link</label>
                                <div class="col-sm-3">
                                    <label class="control-label small" for="date_start">Category</label>
                                    <select name=""  class="form-control" id=""></select>
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label small" for="date_finish">Sub Category</label>
                                    <select name=""  class="form-control" id=""></select>
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label small" for="date_finish">Brand</label>
                                    <select name=""  class="form-control" id=""></select>
                                </div>
                            </div> <!-- form-group // -->
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Image</label>
                                <div class="col-sm-9">
                                    <label class="control-label small" for="file_img">(jpg/png):</label> <input type="file"  class="form-control" name="file_img">
                                </div>
                            </div> <!-- form-group // -->

                    </div><!-- /.box-body -->

                    <div class="box-footer" style="background: #F5F5F5">

                        <div class="form-group">
                            <label class="control-label col-sm-2"></label>
                            <div class="col-sm-10">
                                @if($button_cancel && CRUDBooster::getCurrentMethod() != 'getDetail')
                                    @if(g('return_url'))
                                        <a href='{{g("return_url")}}' class='btn btn-default'><i
                                                    class='fa fa-chevron-circle-left'></i> {{trans("crudbooster.button_back")}}
                                        </a>
                                    @else
                                        <a href='{{CRUDBooster::mainpath("?".http_build_query(@$_GET)) }}'
                                           class='btn btn-default'><i
                                                    class='fa fa-chevron-circle-left'></i> {{trans("crudbooster.button_back")}}
                                        </a>
                                    @endif
                                @endif
                                @if(CRUDBooster::isCreate() || CRUDBooster::isUpdate())

                                    @if(CRUDBooster::isCreate() && $button_addmore==TRUE && $command == 'add')
                                        <input type="submit" name="submit"
                                               value='{{trans("crudbooster.button_save_more")}}'
                                               class='btn btn-success'>
                                    @endif

                                    @if($button_save && $command != 'detail')
                                        <input type="submit" name="submit" value='{{trans("crudbooster.button_save")}}'
                                               class='btn btn-success'>
                                    @endif

                                @endif
                            </div>
                        </div>


                    </div><!-- /.box-footer-->

                </form>

            </div>
        </div>
    </div><!--END AUTO MARGIN-->

@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $("#category_name").on("change", function () {
                var category_id=$(this).val();
                jQuery.ajax({
                    url:"{{route('ajax-request-sub-category')}}",
                    data:{id:category_id},
                    dataType:"html",
                    success:function (data) {
                        $("#sub_category_name").html(data);
                    }
                })
            })
        })
    </script>
@stop
