@extends('controlpanel/mainlayout')

@section('content')
<div class="directions">
    <section class="content-header">
        <h1>
            Upload
        </h1>
    </section>
</div>
<style type="text/css">
    ul li {
        list-style-type: none;
        display: block;
    }
    .box .box-header {
        background-color: #FFFFFF;
        border-radius: 0 0 3px 3px;
        border-bottom: 1px solid #f4f4f4;
        padding: 8px;
    }
    .fieldset {
        border: 1px solid #3c8dbc;
    }
    #fixedcategory{
        height: 100px;
        position: fixed;
        background: red;
    }
    .container1 input[type=text] {
        padding:5px 5px;
        margin:5px 5px 5px 0px;
    }

    .deletebtn{
        width: 91%;
        border-radius: 0;
        height: 34px;
        background-color: #fff;
        border: 1px solid #ccc;
    }
    .xs {
        padding: 5px 5px;
    }
</style>
<section class="content">
    <div class="row">
        <div class="col-md-12">   
            @if (Session::has('success_message'))
            <div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>{{ Session::get('success_message') }}</div>
            @elseif (Session::has('error_message'))
            <div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>{{ Session::get('error_message') }}</div>
            @endif
        </div>
        <div class="col-md-12">            
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Upload Brand</h3>
                </div>
                <form class="cmxform form-horizontal tasi-form" id="signupForm" action="{{URL::to('store-upload-brand')}}" method="post"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="box-body">  
                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Fixed Banner : <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="file" id="product_image" name="fthumb_1" autocomplete="off" required="required" onchange="return uploadimage()">
                                <p style=" margin-top: 5px"><span style="color:red;">&nbsp;*</span>File must be less than 100 KB</p>
                                <p><span style="color:red;">&nbsp;*</span>File format should be .png, .jpg or .jpeg</p>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Title : <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-8">
                                <input type="text" id="title" name="title" class="form-control" autocomplete="off" placeholder="Title" onkeyup="strUpperCase()" value="{{old('title')}}" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Keyword : <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="keyword" name="keyword" autocomplete="off"  placeholder="Keyword" value="{{old('keyword')}}" required="required">
                                <span style="color:#C2C2C2">&nbsp;Hint: Travel, Hotel, Food etc.</span>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Phone Number : </label>
                            <div class="col-sm-2">                                  
                                <input type="text" class="form-control"   id="phnext" name="phnext"  value="+88" readonly="readonly">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control allownumericwithoutdecimal"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                       maxlength = "11" id="phonenumber" name="phonenumber" autocomplete="off" placeholder="01xxxxxxxxx" onkeyup="mobilevalideold(this.val)" value="{{old('phonenumber')}}">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Category : <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-8">
                                <div id="ccccccc" style="height: 150px; overflow-y: scroll; overflow-x: hidden; border: 1px solid #d2d6de;">
                                    <?php
                                    foreach ($categoryList as $category):
                                        echo '<ul>';
                                        echo "<li><input class='' type='checkbox' id='category' name='category[]' required='required' value='" . $category->id . "' >&nbsp;&nbsp;&nbsp"
                                        . $category->category_title . '</li>';
                                        echo '</ul>';
                                    endforeach;
                                    ?>  
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Start Date :</label>
                            <div class="col-sm-3">                                  
                                <input type="text" class="form-control datepicker-without-time"   id="start_date" name="start_date" autocomplete="off" value="{{old('start_date')}}">
                            </div>
                            <label for="meta_title" class="col-sm-2 control-label">End Date:<span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control datepicker-without-time2"  id="end_date" name="end_date"  autocomplete="off" value="{{old('end_date')}}" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Details :<span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="editor1" name="editor1" autocomplete="off" required="required" onkeyup="detailsvalide(this.val)">{{{ old('editor1') }}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Address :<span style="color:red">&nbsp;*</span></label>
                            <div class="col-md-8">
                                <div class="container1">
                                    <div><input type="text" class="form-control" name="myInputs[]" id="myInputs" autocomplete="off" placeholder="Address"  required="required"></div>
                                </div>
                                <button class="btn btn-primary btn-xs add_form_field">Add + </button>
                                <!--                                
                                <div id="dynamicInput">
                                    <input type="text" class="form-control" name="myInputs[]" id="myInputs" autocomplete="off" placeholder="Address"  required="required">
                                </div>
                                -->
                                <!-- <input type="button" value="Add" onClick="addInput('dynamicInput');">-->
                            </div>
                        </div>                        

                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Url : <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="url"  name="url" autocomplete="off" required="required" placeholder=" Web Url" value="{{old('url')}}" required="required"></div>
                        </div> 
                        <div class="box-footer">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <button class="btn btn-primary" onclick="previewvalue()"type="button">Preview </button>&nbsp;&nbsp;
                                <button onclick="return validation2()" class="btn btn-success" type="submit">Save </button>&nbsp;&nbsp; 
                                <a href="{{URL::to('promo-list')}}"><button class="btn btn-danger" type="button">Cancel &nbsp;</button></a>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 360px; height: 640px">                          
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4>Preview</h4>
                </div>
                <div class="modal-body" >
                    <div style="width: 100%; height: 100px">
                        <img id="blah" src="#" alt="your image" width="330" height="100" />
                    </div>

                    <div style="background-color: #E7E7E7; padding: 5px; width: auto; height: auto; font-size: 12px; font-family: arial">
                        <h4 id="titleval"></h4>
                    </div> 
                    <div style="background-color: #FFCDD2; padding: 7px; padding-left: 5px; width: 100%; height: auto; font-size: 12px; font-family: arial">
                        <p id="startdate"><i class="fa fa-calendar" aria-hidden="true"></i> <span id="start_dateval"></span><br></p>
                        <p><i class="fa fa-calendar" aria-hidden="true"></i> <span id="end_dateval"></span><br></p>
                        <p style="padding: 2px;font-size: 12px; font-family: arial" id="phoneval"></p>
                        <p><i class="fa fa-globe" aria-hidden="true"></i> <span style="color: #BA335B; font-weight: bold; font-size: 14px">&nbsp; Click for more details</span></p>
                    </div> 
                    <div style="background-color: #E7E7E7; padding: 5px; width: 100%; height: auto; font-size: 12px; font-family: arial">
                        <h5 style="font-weight: bold">Details</h5>
                        <p id="detailsval"></p>
                    </div>
                    <div style="background-color: #E7E7E7; padding: 5px; width: 100%; height: auto; font-size: 12px; font-family: arial">
                        <h5 style="font-weight: bold">Address</h5>
                        <p id="addressval"></p>
                    </div>
                </div>
                <div class="modal-footer" >
                    <button style="margin-right: 45%" data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
                </div>  
            </div>
        </div>                                        
    </div>
</section>
<script>
    var Script = function () {
        $().ready(function () {
            $("#signupForm").validate({
                ignore: [],
                rules: {
                    product_image: "required",
                    title: "required",
                    category: "required",
                    //editor1: "required",
                    url: {
                        required: true,
                        url: true
                    },
                    editor1: {
                        required: function ()
                        {
                            CKEDITOR.instances.editor1.updateElement();
                        },
                        maxlength: 1200,
                    },
                    phonenumber: {
                        required: false,
                        minlength: 11,
                        maxlength: 11,
                        number: true
                    },
                },
                messages: {
                    //editor1: "This field is required",
                    //product_image: "Please enter your banner",
                    //title: "Please enter title",
                    password: "Please enter at least 6 characters",
                    mobile: "Please enter a valid mobile number"
                },
                errorPlacement: function (error, element)
                {
                    //alert(element.attr("name"));
                    if (element.attr("name") == "editor1")
                    {
                        error.insertBefore("textarea#editor1");
                    } else if (element.attr("name") == "category[]") {
                        error.insertBefore("div#ccccccc");
                    } else {
                        error.insertBefore(element);
                    }
                },
            });
        });
    }();

    $(".allownumericwithoutdecimal").on("keypress keyup blur", function (event) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });
</script>
<script>

    //Multiple address add option
    $(document).ready(function () {
        var max_fields = 10;
        var wrapper = $(".container1");
        var add_button = $(".add_form_field");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<div><input type="text" class="deletebtn" id="myInputs" name="myInputs[]" autocomplete="off" placeholder="Address"/><button class="btn btn-danger btn-xs delete">Delete</button></div>'); //add input box
            }
            else
            {
                bootbox.alert("You can add maximum 10 address");
            }
        })
        $(wrapper).on("click", ".delete", function (e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
</script>
<script type="text/javascript">
    //jquery form validation

    function validation() {

        var service = $("input[name='category[]']:checked").val();
        var details = CKEDITOR.instances['noticeMessage'].getData().replace(/<[^>]*>/gi, '').length;

        var flag = 0;

        if (typeof service == 'undefined') {
            $("#ccccccc").css('border', '1px solid red');
            flag = 0;
            return false;
        }

        if (details == 0) {
            $(".cke_chrome").css('border', '1px solid red');
            flag = 0;
            return false;
        }

        if (flag == 1) {
            return true;
        }
    }

    //Upload Image Validation
    function uploadimage() {
        var fileUpload = document.getElementById("product_image");
        //Get reference of FileUpload.
        //var fileUpload = document.getElementById("fileUpload");
        var size = parseFloat(fileUpload.files[0].size / 1024).toFixed(2);
        if (size > 100) {
            bootbox.alert("Image size must be within 100kb!");
            $("#product_image").val('');
            return false;
        }
        //Check whether the file is valid Image.
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
        if (regex.test(fileUpload.value.toLowerCase())) {

            //Check whether HTML5 is supported.
            if (typeof (fileUpload.files) != "undefined") {
                //Initiate the FileReader object.
                var reader = new FileReader();
                //Read the contents of Image File.
                reader.readAsDataURL(fileUpload.files[0]);
                reader.onload = function (e) {
                    //Initiate the JavaScript Image object.
                    var image = new Image();
                    //Set the Base64 string return from FileReader as source.
                    image.src = e.target.result;
                    //Validate the File Height and Width.
                    image.onload = function () {
                        var height = this.height;
                        var width = this.width;
                        if (height > 350 || width > 950) {
                            bootbox.alert("Height and Width must not exceed 950 x 350!");
                            $("#product_image").val('');
                            return false;
                        }
                    };
                }
            } else {
                alert("This browser does not support HTML5.");
                return false;
            }
        } else {
            alert("Please select a valid Image file.");
            return false;
        }
    }

    //preview image show
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#product_image").change(function () {
        readURL(this);
    });

//    var counter = 1;
//    var limit = 3;
//    function addInput(divName) {
//        var newdiv = document.createElement('div');
//        newdiv.innerHTML = "<br><input type='text' class='form-control' name='myInputs[]'>";
//        document.getElementById(divName).appendChild(newdiv);
//    }

    function strUpperCase() {
        var str = $("#title").val();
        var res = str.toUpperCase();
        $('#title').val(res);
    }

    $('input[type=file]').change(function () {
        console.log();
    });

    //preview
    function previewvalue() {
        var title = $("#title").val();
        var phonenumber = $("#phonenumber").val();
        var phnext = $("#phnext").val();
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        var html = CKEDITOR.instances.editor1.getSnapshot();
        var dom = document.createElement("DIV");
        dom.innerHTML = html;
        var details = (dom.textContent || dom.innerText);
        var address = $("#myInputs").val();
        var url = $("#url").val();

        $("#titleval").text('');
        $("#start_dateval").text('');
        $("#end_dateval").text('');
        $("#phoneval").html('');
        $("#detailsval").text('');
        $("#addressval").text('');

        if ((phonenumber == '') && (start_date == '')) {
            $("#titleval").text(title);
            $("#startdate").hide();
            $("#end_dateval").text('End Date   ' + end_date);
            $("#detailsval").text(details);
            $("#addressval").text(address);
            $('#myModal').modal('toggle');
            $('#myModal').modal('show');

        } else if (phonenumber == '') {
            $("#titleval").text(title);
            $("#start_dateval").text('Start Date       ' + start_date);
            $("#end_dateval").text('End Date          ' + end_date);
            $("#detailsval").text(details);
            $("#addressval").text(address);

            $('#myModal').modal('toggle');
            $('#myModal').modal('show');
        } else if (start_date == '') {
            $("#titleval").text(title);
            $("#end_dateval").text('End Date        ' + end_date);
            $("#phoneval").html('<i class="fa fa-phone" aria-hidden="true"></i> &nbsp;' + phnext + phonenumber);
            $("#detailsval").text(details);
            $("#addressval").text(address);

            $('#myModal').modal('toggle');
            $('#myModal').modal('show');
        } else {
            $("#titleval").text(title);
            $("#start_dateval").text('Start Date     ' + start_date);
            $("#end_dateval").text('End Date       ' + end_date);
            $("#phoneval").html('<i class="fa fa-phone" aria-hidden="true"></i> &nbsp;' + phnext + phonenumber);
            $("#detailsval").text(details);
            $("#addressval").text(address);

            $('#myModal').modal('toggle');
            $('#myModal').modal('show');
        }

    }

    $(function () {
        $(".datepicker-without-time").datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            numberOfMonths: 1,
            onClose: function (selectedDate) {
                $(".datepicker-without-time2").datepicker("option", "minDate", selectedDate);
            }
        });
        $(".datepicker-without-time2").datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            numberOfMonths: 1,
            onClose: function (selectedDate) {
                $(".datepicker-without-time").datepicker("option", "maxDate", selectedDate);
            }
        });
    });

</script>
<script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
<script>
    $(function () {
        CKEDITOR.replace('editor1');
        $(".textarea").wysihtml5();
    });
</script>
<style type="text/css">
    .cke_bottom, .cke_top{
        background: #F8F8F8;

    }
    .cke_bottom {
        height: 1px;
    }
</style>
@stop
