<div class="row">
                    
                    <div class="col-sm-3"> <!--start-select-box------>
                        <select name="" id="shapeselect" class="form-control" >
                            <!-- <option value="">--Select Shape--</option> -->
                            <option selected="selected" value="ROUND">ROUND</option>
                            <option value="PRINCESS">PRINCESS</option>
                        </select>
                    </div> <!---end-select-box--->

                    <div class="col-sm-9"> <!--start-form-box---->

                    <div class="roundSection meleeformbox"><!--start-round-section-->
                    <h4>ROUND</h4>
                   
                    <form id="roundform" action="{{url('admin/submitMeleeDiamond')}}" method="post">
                       @csrf 
                    <div class="row">

                    <div class="col-sm-4"><!--Start-Row-Box--->
                    <div class="form-group row">
                    <label class="col-sm-5 control-label padlabel required" for="shape">Shape:</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="shape" value="ROUND" placeholder="Shape*" name="shape" readonly required>
                    </div>
                    </div>
                    </div><!--End-Row-Box---->

                    <div class="col-sm-4"><!--Start-Row-Box--->
                    <div class="form-group row">
                    <label class="col-sm-5 control-label padlabel required" for="weight">Weight(Pts):</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="weight" placeholder="Weight(Pts)*" name="weight" required>
                    </div>
                    </div>
                    </div><!--End-Row-Box---->

                    <div class="col-sm-4"><!--Start-Row-Box--->
                    <div class="form-group row">
                    <label class="col-sm-5 control-label padlabel required" for="size">size(mm):</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="size" placeholder="size(mm)*" name="size" required>
                    </div>
                    </div>
                    </div><!--End-Row-Box---->

                    <div class="col-sm-4"><!--Start-Row-Box--->
                    <div class="form-group row">
                    <label class="col-sm-5 control-label padlabel required" for="EF_VS">EF/VS($):</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="EF_VS" placeholder="EF/VS($)*" name="EF_VS" required>
                    </div>
                    </div>
                    </div><!--End-Row-Box---->

                    <div class="col-sm-4"><!--Start-Row-Box--->
                    <div class="form-group row">
                    <label class="col-sm-5 control-label padlabel required" for="GH_VS">GH/VS($):</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="GH_VS" placeholder="GH/VS($)*" name="GH_VS" required>
                    </div>
                    </div>
                    </div><!--End-Row-Box---->

                    <div class="col-sm-4"><!--Start-Row-Box--->
                    <div class="form-group row">
                    <label class="col-sm-5 control-label padlabel required" for="EF_SI1">EF/SI1($):</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="EF_SI1" placeholder="EF/SI1($)*" name="EF_SI1" required>
                    </div>
                    </div>
                    </div><!--End-Row-Box---->
                
                    <div class="col-sm-4"><!--Start-Row-Box--->
                    <div class="form-group row">
                    <label class="col-sm-5 control-label padlabel required" for="GH_SI1">GH/SI1($):</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="GH_SI1" placeholder="GH/SI1($)*" name="GH_SI1" required>
                    </div>
                    </div>
                    </div><!--End-Row-Box---->
                    
                    <div class="col-sm-4"><!--Start-Row-Box--->
                    <div class="form-group row">
                    <label class="col-sm-5 control-label padlabel required" for="EF_SI2">EF/SI2($):</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="EF_SI2" placeholder="EF/SI2($)*" name="EF_SI2" required>
                    </div>
                    </div>
                    </div><!--End-Row-Box---->

                    <div class="col-sm-4"><!--Start-Row-Box--->
                    <div class="form-group row">
                    <label class="col-sm-5 control-label padlabel required" for="GH_SI2">GH/SI2($):</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="GH_SI2" placeholder="GH/SI2($)*" name="GH_SI2" required>
                    </div>
                    </div>
                    </div><!--End-Row-Box---->

                    <div class="col-sm-4"><!--Start-Row-Box--->
                    <div class="form-group row">
                    <label class="col-sm-5 control-label padlabel required" for="IJ_SI1">IJ/SI1($):</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="IJ_SI1" placeholder="IJ/SI1($)*" name="IJ_SI1" required>
                    </div>
                    </div>
                    </div><!--End-Row-Box---->

                    <div class="col-sm-12 text-center"><!--Start-submit--->
                      <button type="submit" class="btn btn-primary">ADD</button>
                    </div><!--End-submit--->

                    </div>
                    </form>
                    </div><!--end-round-section-->

        <!-------><div class="princessSection meleeformbox"><!--start-Princess-section-->
                    <h4>PRINCESS</h4>

                    <form id="princessform" action="{{url('admin/submitMeleeDiamond')}}" method="post">
                    @csrf 
                    <div class="row">
                    <div class="col-sm-4"><!--Start-Row-Box--->
                    <div class="form-group row">
                    <label class="col-sm-5 control-label padlabel required" for="shape">Shape:</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="shape" value="PRINCESS" placeholder="Shape*" name="shape" readonly required>
                    </div>
                    </div>
                    </div><!--End-Row-Box---->

                    <div class="col-sm-4"><!--Start-Row-Box--->
                    <div class="form-group row">
                    <label class="col-sm-5 control-label padlabel required" for="weight">Weight(Pts):</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="weight" placeholder="Weight(Pts)*" name="weight" required>
                    </div>
                    </div>
                    </div><!--End-Row-Box---->

                    <div class="col-sm-4"><!--Start-Row-Box--->
                    <div class="form-group row">
                    <label class="col-sm-5 control-label padlabel required" for="size">size(mm):</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="size" placeholder="size(mm)*" name="size" required>
                    </div>
                    </div>
                    </div><!--End-Row-Box---->

                    <div class="col-sm-4"><!--Start-Row-Box--->
                    <div class="form-group row">
                    <label class="col-sm-5 control-label padlabel required" for="EF_VS">EF/VS($):</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="EF_VS" placeholder="EF/VS($)*" name="EF_VS" required>
                    </div>
                    </div>
                    </div><!--End-Row-Box---->

                    <div class="col-sm-4"><!--Start-Row-Box--->
                    <div class="form-group row">
                    <label class="col-sm-5 control-label padlabel required" for="GH_VS">GH/VS($):</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="GH_VS" placeholder="GH/VS($)*" name="GH_VS" required>
                    </div>
                    </div>
                    </div><!--End-Row-Box---->

                    <div class="col-sm-4"><!--Start-Row-Box--->
                    <div class="form-group row">
                    <label class="col-sm-5 control-label padlabel required" for="EF_SI">EF/SI($):</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="EF_SI" placeholder="EF/SI($)*" name="EF_SI" required>
                    </div>
                    </div>
                    </div><!--End-Row-Box---->
                   

                    <div class="col-sm-4"><!--Start-Row-Box--->
                    <div class="form-group row">
                    <label class="col-sm-5 control-label padlabel required" for="GH_SI">GH/SI($):</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="GH_SI" placeholder="GH/SI($)*" name="GH_SI" required>
                    </div>
                    </div>
                    </div><!--End-Row-Box---->

                    <div class="col-sm-12 text-center"><!--Start-submit--->
                      <button type="submit" class="btn btn-primary">ADD</button>
                    </div><!--End-submit--->

                    </div>
                    </form>
            <!-------></div><!--end-Princess-section-->



                    </div><!--end-form-box---->


                </div>
                </div> 