@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.diamondfeeds.management') . ' | ' . trans('labels.backend.diamondfeeds.import'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.diamondfeeds.management') }}
        <small>{{ trans('labels.backend.diamondfeeds.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.diamondfeeds.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-diamondfeed', 'enctype' => 'multipart/form-data']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.diamondfeeds.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.diamondfeeds.partials.diamondfeeds-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                   {{-- @include("backend.diamondfeeds.form")--}}
                   <div class="box-body">
                    <div class="form-group">
                        <!-- Create Your Field Label Here -->
                        <!-- Look Below Example for reference -->
                        {{-- {{ Form::label('name', trans('labels.backend.blogs.title'), ['class' => 'col-lg-2 control-label required']) }} --}}
                        {{ Form::label('name', trans('labels.backend.blogs.title'), ['class' => 'col-lg-2 control-label required']) }}
                        <div class="col-lg-10">
                            <!-- Create Your Input Field Here -->
                            <!-- Look Below Example for reference -->
                            {{-- {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.blogs.title'), 'required' => 'required']) }} --}}
                            {{ Form::file('feed_file', ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.blogs.title'), 'required' => 'required', 'accept'=>'.csv' ]) }}
                        </div><!--col-lg-10-->
                    </div><!--form-group-->
                </div><!--box-body-->
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.diamondfeeds.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-primary btn-md']) }}

                        <a target="new" style="margin-left:15px;" href="https://s.docworkspace.com/d/AKcIvEKC-vsbkMiMpqSdFA">Sample CSV for Import <b>&#8595;</b></a>
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!-- form-group -->
            </div><!--box-body-->
        </div><!--box box-success-->
    {{ Form::close() }}
@endsection
