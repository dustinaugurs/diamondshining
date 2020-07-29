<div class="box-body">
    <div class="">
    <div class="form-group">
    <label for="title" class="col-lg-2 control-label required"> Template Title </label>

    <div class="col-lg-10">
    {{ Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' => 'Template Title', 'required' => 'required']) }}
    <!-- <input type="text" class="form-control box-size" placeholder="Template Title" name="title" required /> -->
    </div>
    </div>
    {{-- 
    <div class="form-group">
    <label for="title" class="col-lg-2 control-label required">  Select Diamond Feed  </label>

    <div class="col-lg-10">
    @if(!empty($selectedCategories))
            {{ Form::select('diamond_feed', $diamondFeeds, $selectedCategories, ['class' => 'form-control tags box-size', 'placeholder' =>'Select Diamond Feed','required' => 'required']) }}
        @else
            {{ Form::select('diamond_feed', $diamondFeeds, null, ['class' => 'form-control tags box-size','placeholder' =>'Select Diamond Feed', 'required' => 'required']) }}
        @endif
    <!-- <input type="text" class="form-control box-size" placeholder="Template Title" name="title" required /> -->
    </div>
    </div>
--}}
  <!--  <div class="form-group">
    <label for="title" class="col-lg-2 control-label required">VAT From (GBP)</label>
    <div class="col-lg-4">
    {{ Form::text('vat_from_gbp', null, ['class' => 'form-control box-size', 'placeholder' => 'VAT From (GBP)', 'required' => 'required']) }}
    <!-- <input type="text" class="form-control box-size" placeholder="VAT From (GBP)" name="vat_from_gbp" required /> -->
    <!-- </div>
     <!--<label for="title" class="col-lg-2 control-label required">VAT To(GBP)</label>
    <div class="col-lg-4">
     <!--{{ Form::text('vat_to_gbp', null, ['class' => 'form-control box-size', 'placeholder' => 'VAT To (GBP)', 'required' => 'required']) }}
    <!-- <input type="text" class="form-control box-size" placeholder="VAT To(GBP)" name="vat_to_gbp" required /> -->
    <!-- </div>

   <!--  </div> -->

    <div class="form-group">
    <label for="title" class="col-lg-2 control-label required">VAT From (USD)</label>
    <div class="col-lg-4">
    {{ Form::text('vat_from_usd', null, ['class' => 'form-control box-size', 'placeholder' => 'VAT From (USD)', 'required' => 'required']) }}
    <!-- <input type="text" class="form-control box-size" placeholder="VAT From (USD)" name="vat_from_usd" required /> -->
    </div>
    <label for="title" class="col-lg-2 control-label required">VAT To(USD)</label>
    <div class="col-lg-4">
    {{ Form::text('vat_to_usd', null, ['class' => 'form-control box-size', 'placeholder' => 'VAT To(USD)', 'required' => 'required']) }}
    <!-- <input type="text" class="form-control box-size" placeholder="VAT To(USD)" name="vat_to_usd" required /> -->
    </div>
    </div>

    <div class="form-group">
    <!-- <label for="title" class="col-lg-2 control-label required">Multiplier(GBP) </label>
    <div class="col-lg-4">
    {{ Form::text('multiplier_gbp', null, ['class' => 'form-control box-size', 'placeholder' => 'Multiplier(GBP)', 'required' => 'required']) }}
    <!-- <input type="text" class="form-control box-size" placeholder="Multiplier(GBP)" name="multiplier_gbp" required /> -->
    <!-- </div> -->
    <label for="title" class="col-lg-2 control-label required">Multiplier(USD) </label>
    <div class="col-lg-8">
    {{ Form::text('multiplier_usd', null, ['class' => 'form-control box-size', 'placeholder' => 'Multiplier(USD)', 'required' => 'required']) }}
    <!-- <input type="text" class="form-control box-size" placeholder="Multiplier(USD)" name="multiplier_usd" required /> -->
    </div>
    </div>

    <div class="">
    <label for="title" class="col-lg-2 control-label required">Status</label>
    <div class="col-lg-10">
    <div class="radio-inline">
    {{ Form::radio('is_term_accept', 1, true,['class' => 'form-check-input', 'required' => 'required']) }}
        <!-- <input class="form-check-input" type="radio" id="inlineCheckbox1" value="1" name="is_term_accept"> -->
        <label class="form-check-label" for="inlineCheckbox1">Active</label>
    </div>
     <div class="radio-inline">
     {{ Form::radio('is_term_accept', 0, ['class' => 'form-check-input', 'required' => 'required']) }}
        <label class="form-check-label" for="inlineCheckbox2">Inactive</label>
        </div>
    </div>
    </div>

    </div><!--form-group-->
</div><!--box-body-->

@section("after-scripts")
    <script type="text/javascript">
        //Put your javascript needs in here.
		
        //Don't forget to put `@`parent exactly after `@`section("after-scripts"),

        //if your create or edit blade contains javascript of its own
		
        $( document ).ready( function() {

            //Everything in here would execute after the DOM is ready to manipulated.
		
        });
    </script>
@endsection