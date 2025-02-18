@extends('layouts.app')

@section('title', 'AdminLTE v4 | Edit Blog')
@section('breadcrumb-title', 'Edit Blog')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.css" integrity="sha512-YOUR_INTEGRITY_HASH" crossorigin="anonymous" />
    <style>
        .wizard > .steps a, .wizard > .steps a:hover, .wizard > .steps a:active {
            margin: 0;
        }


        .card-header{
            line-height: 25px!important;
        }
        .scheduler-border{
            line-height: 25px!important;
        }
        @media (min-width: 768px) {
            .form-group row {
                display: flex;
                align-items: center;
            }
            .required-star::after {
                content: '*';
                color: red;
                margin-left: 0px !important;
            }
        }

        .select2-container--default{
            width: 100% ;
        }
        .border_dashed {
            border: 2px dashed #D0D5DD;
        }
        .table_heading2 {
            background-color: #D9D9D9 !important;
            color: #000000;
        }
        .btn-dark {
            color: #fff;
            background-color: #D9D9D9;
            border-color: #17a2b8;
            box-shadow: none;
        }
        .btn-gray{
            background-color: #fff;
            color: #54667a;
            border: 1px solid #d9d9d9;
            padding: 7px 12px;
        }
        .card-header{
            color: #22304E;
            font-family: Nikosh, serif;
            font-size: 17.243px;
            font-style: normal;
            font-weight: 700;
            line-height: 15.675px;
            padding-bottom: 17px;
            padding-top: 17px;
        }
        .content{
            background: #F6FAFC !important;

        }
        .wrapper {
            background: #F6FAFC !important;

        }
        .container-bg{
            background: #F6FAFC !important;

        }
        .file-up-btn{
            background: var(--neutral-07, #DADEE3);
        }

        .wizard-content .wizard>.steps>ul>li:after,
        .wizard-content .wizard>.steps>ul>li:before {
            content: '';
            z-index: 9;
            display: block;
            position: absolute
        }

        .wizard-content .wizard {
            width: 100%;
            overflow: hidden
        }

        .wizard-content .wizard .content {
            margin-left: 0!important
        }

        .wizard-content .wizard>.steps {
            position: relative;
            display: block;
            width: 104%;
        }

        .wizard-content .wizard>.steps .current-info {
            position: absolute;
            left: -99999px
        }

        .wizard-content .wizard>.steps>ul {
            display: flex;
            /*justify-content: center;*/
            /*width: 100%;*/
            width: 98%;
            table-layout: fixed;
            margin: 0;
            padding: 0;
            overflow-x: auto;
            list-style: none
        }

        .wizard-content .wizard>.steps>ul>li {
            display: table-cell;
            width: {{ 100 / 3 }}%;  /* Step Count */
            vertical-align: top;
            text-align: center;
            position: relative
        }

        .wizard-content .wizard>.steps>ul>li a {
            position: relative;
            padding-top: 52px;
            margin-top: 20px;
            margin-bottom: 20px;
            display: block
        }

        .wizard-content .wizard>.steps>ul>li:before {
            left: 0
        }

        .wizard-content .wizard>.steps>ul>li:after {
            right: 0
        }

        .wizard-content .wizard>.steps>ul>li:first-child:before,
        .wizard-content .wizard>.steps>ul>li:last-child:after {
            content: none
        }

        .wizard-content .wizard>.steps>ul>li.current>a {
            background: transparent !important;
            color: #2f3d4a;
            cursor: default;
            text-align: center;
            font-feature-settings: 'clig' off, 'liga' off;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 26px;
        }

        .wizard-content .wizard>.steps>ul>li.current .step {
            border-color: #FFF ;
            background-color: #376C4B;
            color: #FFF;
            box-shadow: 0 0 0 1px #22098A;

        }

        .wizard-content .wizard>.steps>ul>li.disabled a,
        .wizard-content .wizard>.steps>ul>li.disabled a:focus,
        .wizard-content .wizard>.steps>ul>li.disabled a:hover {
            background: transparent !important;
            cursor: default;
            color:#545D69;
            text-align: center;
            font-feature-settings: 'clig' off, 'liga' off;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 26px;
        }

        .wizard-content .wizard>.steps>ul>li.done a,
        .wizard-content .wizard>.steps>ul>li.done a:focus,
        .wizard-content .wizard>.steps>ul>li.done a:hover {
            background: transparent !important;
            color: black;
            text-align: center;
            font-feature-settings: 'clig' off, 'liga' off;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 26px;
        }

        .wizard-content .wizard>.steps>ul>li.done .step {
            background-color: #376C4B;
            /*border-color: #22098A ;*/
            border-color: #FFF ;
            box-shadow: 0 0 0 1px #22098A;
            color: #fff;
            text-align: center;
            font-feature-settings: 'clig' off, 'liga' off;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
        }

        .wizard-content .wizard>.steps>ul>li.error .step {
            border-color: #f62d51;
            color: #f62d51
        }

        .wizard-content .wizard>.steps .step {
            background-color: #fff;
            display: inline-block;
            position: absolute;
            top: 0;
            left: 50%;
            margin-left: -24px;
            z-index: 10;
            text-align: center
        }

        .wizard-content .wizard>.content {
            overflow: hidden;
            position: relative;
            width: auto;
            padding: 0;
            margin: 0
        }

        .wizard-content .wizard>.content>.title {
            position: absolute;
            left: -99999px
        }

        .wizard-content .wizard>.content>.body {
            padding: 0 20px
        }

        .wizard-content .wizard>.content>iframe {
            border: 0;
            width: 100%;
            height: 100%
        }

        .wizard-content .wizard>.actions {
            position: relative;
            display: block;
            text-align: right;
            padding: 0 4px 20px;
            width: 34% !important;
            margin-right: 13px;
        }

        .wizard-content .wizard>.actions>ul {
            float: right;
            list-style: none;
            padding: 0;
            margin: 0;
            margin-top: 5px;
        }

        .wizard-content .wizard>.actions>ul:after {
            content: '';
            display: table;
            clear: both
        }

        .wizard-content .wizard>.actions>ul>li {
            float: left
        }

        .wizard-content .wizard>.actions>ul>li+li {
            margin-left: 10px
        }

        .wizard-content .wizard>.actions>ul>li>a {
            background: #00c0ef ;
            color: #fff;
            display: block;
            padding: 7px 12px;
            border-radius: 4px;
            border: 1px solid transparent
        }

        .wizard-content .wizard>.actions>ul>li>a:focus,
        .wizard-content .wizard>.actions>ul>li>a:hover {
            -webkit-box-shadow: 0 0 0 100px rgba(0, 0, 0, .05) inset;
            box-shadow: 0 0 0 100px rgba(0, 0, 0, .05) inset
        }

        .wizard-content .wizard>.actions>ul>li>a:active {
            -webkit-box-shadow: 0 0 0 100px rgba(0, 0, 0, .1) inset;
            box-shadow: 0 0 0 100px rgba(0, 0, 0, .1) inset
        }

        .wizard-content .wizard>.actions>ul>li>a[href="#previous"] {
            background-color: #59adf6;
            color: #fff;
            border: 1px solid #d9d9d9
        }

        .wizard-content .wizard>.actions>ul>li>a[href="#previous"]:focus,
        .wizard-content .wizard>.actions>ul>li>a[href="#previous"]:hover {
            -webkit-box-shadow: 0 0 0 100px rgba(0, 0, 0, .02) inset;
            box-shadow: 0 0 0 100px rgba(0, 0, 0, .02) inset
        }

        .wizard-content .wizard>.actions>ul>li>a[href="#previous"]:active {
            -webkit-box-shadow: 0 0 0 100px rgba(0, 0, 0, .04) inset;
            box-shadow: 0 0 0 100px rgba(0, 0, 0, .04) inset
        }

        .wizard-content .wizard>.actions>ul>li.disabled>a,
        .wizard-content .wizard>.actions>ul>li.disabled>a:focus,
        .wizard-content .wizard>.actions>ul>li.disabled>a:hover {
            color: #999
        }

        .wizard-content .wizard>.actions>ul>li.disabled>a[href="#previous"],
        .wizard-content .wizard>.actions>ul>li.disabled>a[href="#previous"]:focus,
        .wizard-content .wizard>.actions>ul>li.disabled>a[href="#previous"]:hover {
            -webkit-box-shadow: none;
            box-shadow: none;
            background: white;
            padding: 7px 5px
        }

        .wizard-content .wizard.wizard-circle>.steps>ul>li:after,
        .wizard-content .wizard.wizard-circle>.steps>ul>li:before {
            top: 45px;
            width: 50%;
            height: 1px;
            background-color: #22098A;

        }

        .wizard-content .wizard.wizard-circle>.steps>ul>li.current:after,
        .wizard-content .wizard.wizard-circle>.steps>ul>li.current~li:after,
        .wizard-content .wizard.wizard-circle>.steps>ul>li.current~li:before {
            background-color: #ede5e5;
        }

        .wizard-content .wizard.wizard-circle>.steps .step {
            background : #DADEE3;
            width: 50px;
            height: 50px;
            color: #545D69;
            line-height: 40px;
            border: 6px solid #FFF;
            font-size: 1.3rem;
            border-radius: 50%;
            box-shadow: 0 0 0 1px #DADEE3;
        }

        .wizard-content .wizard.wizard-notification>.steps>ul>li:after,
        .wizard-content .wizard.wizard-notification>.steps>ul>li:before {
            top: 39px;
            width: 50%;
            height: 2px;
            background-color: #009efb
        }

        .wizard-content .wizard.wizard-notification>.steps>ul>li.current .step {
            border: 2px solid #009efb ;
            color: #009efb ;
            line-height: 36px
        }

        .wizard-content .wizard.wizard-notification>.steps>ul>li.current .step:after,
        .wizard-content .wizard.wizard-notification>.steps>ul>li.done .step:after {
            border-top-color: transparent !important;
        }

        .wizard-content .wizard.wizard-notification>.steps>ul>li.current:after,
        .wizard-content .wizard.wizard-notification>.steps>ul>li.current~li:after,
        .wizard-content .wizard.wizard-notification>.steps>ul>li.current~li:before {
            background-color: #F3F3F3
        }

        .wizard-content .wizard.wizard-notification>.steps>ul>li.done .step {
            color: #FFF
        }

        .wizard-content .wizard.wizard-notification>.steps .step {
            width: 40px;
            height: 40px;
            line-height: 40px;
            font-size: 1.3rem;
            border-radius: 15%;
            background-color: #F3F3F3
        }

        .wizard-content .wizard.wizard-notification>.steps .step:after {
            content: "";
            width: 0;
            height: 0;
            position: absolute;
            bottom: 0;
            left: 50%;
            margin-left: -8px;
            margin-bottom: -8px;
            border-left: 7px solid transparent;
            border-right: 7px solid transparent;
            border-top: 8px solid #F3F3F3
        }

        .wizard-content .wizard.vertical>.steps {
            display: inline;
            float: left;
            width: 20%
        }

        .wizard-content .wizard.vertical>.steps>ul>li {
            display: block;
            width: 100%
        }

        .wizard-content .wizard.vertical>.steps>ul>li.current:after,
        .wizard-content .wizard.vertical>.steps>ul>li.current:before,
        .wizard-content .wizard.vertical>.steps>ul>li.current~li:after,
        .wizard-content .wizard.vertical>.steps>ul>li.current~li:before,
        .wizard-content .wizard.vertical>.steps>ul>li:after,
        .wizard-content .wizard.vertical>.steps>ul>li:before {
            background-color: transparent
        }

        @media (max-width:768px) {
            .wizard-content .wizard>.steps>ul {
                margin-bottom: 20px
            }
            .wizard-content .wizard>.steps>ul>li {
                display: block;
                float: left;
                width: 50%
            }
            .wizard-content .wizard>.steps>ul>li>a {
                margin-bottom: 0
            }
            .wizard-content .wizard>.steps>ul>li:first-child:before {
                content: ''
            }
            .wizard-content .wizard>.steps>ul>li:last-child:after {
                content: '';
                background-color: #009efb
            }
            .wizard-content .wizard.vertical>.steps {
                width: 15%
            }
        }

        @media (max-width:480px) {
            .wizard-content .wizard>.steps>ul>li {
                width: 100%
            }
            .wizard-content .wizard>.steps>ul>li.current:after {
                background-color: #009efb
            }
            .wizard-content .wizard.vertical>.steps>ul>li {
                display: block;
                float: left;
                width: 50%
            }
            .wizard-content .wizard.vertical>.steps {
                width: 100%;
                float:none;
            }
        }
        .max-file{
            color: var(--foundation-error-e-400, #B34545);
        }
        .tbl-head{
            color: var(--primary-p-200, #009444);
        }
        .error + span .select2-selection {
            border: 1px solid red;
        }
        @media (max-width:563px) {
            .mobilebtn-hide {
                display: none;
            }
        }
        @media (max-width:410px) {
            .mobile-close-btn-hide {
                display: none;
            }
        }
        .note {
            background-color: #f9f9f9;
            border-left: 6px solid #007bff; /* Change color as needed */
            padding: 10px;
            margin-bottom: 20px;
        }
        .note p {
            margin: 0;
        }


        .animated-button {
            padding: 6px;
            font-size: 1.2rem;
            border: none;
            color: #fff;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
            margin-left: 10px;
            pointer-events: none;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        .neon-pulse {
            background: linear-gradient(45deg, #2980b9, #3498db);
            animation: neon-pulse 1.5s infinite;
        }

        @keyframes neon-pulse {

            50% {
                box-shadow: 0 0 5px 5px #3498db;
            }
            100% {
                box-shadow: 0 0 1px 0 #3498db;
            }
        }
        .comment-container {
            background-color: #ebdada;
            padding: 10px;
            border: 1px solid #bf1414;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .comment-highlight {
            font-size: 14px;
            color: #333;

        }

        .actions {
            display: flex;
            justify-content: flex-end; /* Aligns the child elements to the right */
            align-items: center;
        }

        .actions ul {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            gap: 10px; /* Optional spacing between buttons */
        }

        #blog-form-p-0 , #blog-form-p-1 , #blog-form-p-2 {
            background: white !important;
        }
    </style>

@endpush

@section('content')
    <div class="py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card wizard-card">
                    <div class="card-body">
                        <div class="wizard-content">
                            <form id="blog-form" action="{{ route('blogs.update', $blog->id) }}" method="POST" class="tab-wizard wizard-circle">
                                @csrf
                                @method('PUT')

                                <!-- Step 1: Basic Info -->
                                <h6>Basic Info</h6>
                                <section>
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <div class="form-group mt-4">
                                                <label for="title" class="form-label">Blog Title</label>
                                                <input id="title" name="title" type="text" class="form-control" placeholder="Enter blog title" value="{{ old('title', $blog->title) }}" required>
                                            </div>

                                            <div class="form-group mt-4">
                                                <label for="author" class="form-label">Author</label>
                                                <input id="author" name="author" type="text" class="form-control" placeholder="Enter author name" value="{{ old('author', $blog->author) }}">
                                            </div>

                                            <div class="alert alert-light mt-4">
                                                <div class="d-flex">
                                                    <div class="me-3">
                                                        <i class="fas fa-info-circle fs-4 text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="alert-heading">First Step: Basic Information</h6>
                                                        <p class="mb-0">Update the essential details for your blog post.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <!-- Step 2: Summary & Categories -->
                                <h6>Summary</h6>
                                <section>
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="summary" class="form-label">Summary</label>
                                                <textarea id="summary" name="summary" class="form-control" rows="4" placeholder="Enter a brief summary of your blog post">{{ old('summary', $blog->summary) }}</textarea>
                                                <small class="text-muted">A good summary helps readers understand what to expect from your post.</small>
                                            </div>

                                            <div class="form-group mt-4">
                                                <label for="category" class="form-label">Category</label>
                                                <select id="category" name="category" class="form-select">
                                                    <option value="" disabled {{ is_null($blog->category) ? 'selected' : '' }}>Select a category</option>
                                                    <option value="news" {{ old('category', $blog->category) == 'news' ? 'selected' : '' }}>News</option>
                                                    <option value="tutorial" {{ old('category', $blog->category) == 'tutorial' ? 'selected' : '' }}>Tutorial</option>
                                                    <option value="opinion" {{ old('category', $blog->category) == 'opinion' ? 'selected' : '' }}>Opinion</option>
                                                    <option value="review" {{ old('category', $blog->category) == 'review' ? 'selected' : '' }}>Review</option>
                                                    <option value="technology" {{ old('category', $blog->category) == 'technology' ? 'selected' : '' }}>Technology</option>
                                                </select>
                                            </div>

                                            <div class="alert alert-light mt-4">
                                                <div class="d-flex">
                                                    <div class="me-3">
                                                        <i class="fas fa-lightbulb fs-4 text-warning"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="alert-heading">Second Step: Summary & Category</h6>
                                                        <p class="mb-0">Categorize your content to help readers find related articles.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <!-- Step 3: Content & Tags -->
                                <h6>Content</h6>
                                <section>
                                    <div class="row justify-content-center">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="content" class="form-label">Blog Content</label>
                                                <textarea id="content" name="content" class="form-control" rows="8" placeholder="Enter your blog content here" required>{{ old('content', $blog->content) }}</textarea>
                                                <small class="text-muted">Rich text editor will be loaded automatically if configured.</small>
                                            </div>

                                            <div class="form-group mt-4">
                                                <label for="tags" class="form-label">Tags</label>
                                                <input id="tags" name="tags" type="text" class="form-control" placeholder="e.g. laravel, tutorial, web-development" value="{{ old('tags', $blog->tags) }}">
                                                <small class="text-muted">Separate tags with commas. They help improve the discoverability of your content.</small>
                                            </div>

                                            <div class="alert alert-primary mt-4">
                                                <div class="d-flex">
                                                    <div class="me-3">
                                                        <i class="fas fa-check-circle fs-4"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="alert-heading">Final Step!</h6>
                                                        <p class="mb-0">Click "Finish" to update your blog post.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>

    <script>
        $(document).ready(function() {
            var form = $("#blog-form");

            form.steps({
                headerTag: "h6",
                bodyTag: "section",
                transitionEffect: "fade",
                titleTemplate: '<span class="step">#index#</span> <span class="title">#title#</span>',
                labels: {
                    finish: "Update",
                    next: "Next Step",
                    previous: "Back"
                },
                onStepChanging: function(event, currentIndex, newIndex) {
                    // Always allow going backward
                    if (currentIndex > newIndex) {
                        return true;
                    }
                    // Basic validation example: require title on first step
                    if (currentIndex === 0 && $('#title').val().trim() === "") {
                        return false;
                    }
                    return true;
                },
                onStepChanged: function(event, currentIndex, priorIndex) {
                    // If on the content step, initialize rich text editor if needed
                    if (currentIndex === 2 && typeof tinymce !== 'undefined') {
                        tinymce.init({
                            selector: '#content',
                            height: 300,
                            menubar: false
                        });
                    }
                },
                onFinishing: function(event, currentIndex) {
                    // Validate final step
                    return $('#content').val().trim() !== "";
                },
                onFinished: function(event, currentIndex) {
                    form.submit();
                }
            });
        });
    </script>
@endpush
