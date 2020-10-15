

            <div class="frontmeleediamondbox">
                <h5>Round ( prices per carat )</h5>
            <table class="table table-condensed table-hover table-bordered" id="data-table">
            <thead>
            <tr>
            <th>#</th>
            <th>Weight (pts)</th>
            <th>Size (mm)</th>
            <th>EF/VS</th>
            <th>GH/VS</th>
            <th>EF/SI1</th>
            <th>GH/SI1</th>
            <th>EF/SI2</th>
            <th>GH/SI2</th>
            <th>IJ/SI1</th>
            <!-- <th>Action</th> -->
            </tr>
            </thead>
            <tbody>
            @if(!empty($meleediamondRound))
                @foreach($meleediamondRound as $round)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$round->weight}}</td>
                    <td>{{$round->size}}</td>
                    <td>{{$symbol.''.@round($current_currency*$round->EF_VS, 2)}}</td>
                    <td>{{$symbol.''.@round($current_currency*$round->GH_VS, 2)}}</td>
                    <td>{{$symbol.''.@round($current_currency*$round->EF_SI1, 2)}}</td>
                    <td>{{$symbol.''.@round($current_currency*$round->GH_SI1, 2)}}</td>
                    <td>{{$symbol.''.@round($current_currency*$round->EF_SI2, 2)}}</td>
                    <td>{{$symbol.''.@round($current_currency*$round->GH_SI2, 2)}}</td>
                    <td>{{$symbol.''.@round($current_currency*$round->IJ_SI1, 2)}}</td>
                </tr>
                @endforeach
                @else
                <tr> <td colspan="10"> No Data Found </td> </tr>
                @endif

            </tbody>
            </table>
            </div> 
      
            <div class="frontmeleediamondbox">
                <div class="col-sm-8 margboxws">
            <h5>Princess ( prices per carat )</h5>
            <table class="table table-condensed table-hover table-bordered" id="data-table2">
            <thead>
            <tr>
            <th>#</th>
            <th>Weight (pts)</th>
            <th>Size (mm)</th>
            <th>EF/VS</th>
            <th>GH/VS</th>
            <th>EF/SI</th>
            <th>GH/SI</th>
            <!-- <th>Action</th> -->
            </tr>
            </thead>
            <tbody>
                @if(!empty($meleediamondPrincess))
                @foreach($meleediamondPrincess as $princess)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$princess->weight}}</td>
                    <td>{{$princess->size}}</td>
                    <td>{{$symbol.''.@round($current_currency*$princess->EF_VS, 2)}}</td>
                    <td>{{$symbol.''.@round($current_currency*$princess->GH_VS, 2)}}</td>
                    <td>{{$symbol.''.@round($current_currency*$princess->EF_SI, 2)}}</td>
                    <td>{{$symbol.''.@round($current_currency*$princess->GH_SI, 2)}}</td>
                </tr>
                @endforeach
                @else
                <tr> <td colspan="7"> No Data Found </td> </tr>
                @endif
            </tbody>
            </table>
            </div> 
            </div>
           
							  
<!-----------end-Copy-Model--------------->

							 
							 
							 