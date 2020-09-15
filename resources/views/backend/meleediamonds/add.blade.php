@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.diamondfeeds.management') . ' | ' . trans('labels.backend.diamondfeeds.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.diamondfeeds.management') }}
        <small>{{ trans('labels.backend.diamondfeeds.edit') }}</small>
    </h1>
@endsection

@section('content')
   
        <div class="box box-info">
        <div class="boxHeader meleeheading">
            
            <div class="tab">   
      <button class="tablinks"><a href="{{url('admin/meleediamonds')}}">{{ trans('labels.backend.meleediamonds.roundlist') }}</a></button>
      <button class="tablinks"><a href="{{url('admin/princessList')}}">{{ trans('labels.backend.meleediamonds.princeslist') }}</a></button>
      <button class="tablinks active"><a href="{{url('admin/addMeleeDiamond')}}">
      @if(!empty($meleediamonds))
      {{ trans('labels.backend.meleediamonds.edit') }}
      @else 
      {{ trans('labels.backend.meleediamonds.add') }}
      @endif
    </a></button>
    </div>
      
            </div><!--box-header with-border-->

            <div class="box-body"> <!---start-box-body---->

                 
                @if(!empty($meleediamonds))
                
                @if($meleediamonds->shape == 'ROUND')
                 @include('backend.meleediamonds.editDiamond_component') 
                @elseif($meleediamonds->shape == 'PRINCESS')
                 @include('backend.meleediamonds.editPrincess_component') 
                 @endif
          
                 @else
                 @include('backend.meleediamonds.add_component') 
                 @endif

               
        </div><!--box box-success -->
   
@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}
<script type="text/javascript">

$(document).ready(function(){
    
    $('body').on('change', '#shapeselect', function(){
          var value = $(this).val();
          var princess = $('.princessSection');
          var round = $('.roundSection');
         if(value=='ROUND'){
            round.css('display','block');
            princess.css('display','none');   
         }else if(value=='PRINCESS'){
            princess.css('display','block'); 
            round.css('display','none');
         }else{
            round.css('display','block');
            princess.css('display','none');    
         }
          
        console.log(value);
      });


  });
  </script>

@endsection
