<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Repositories\Frontend\Access\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

/**
 * Class ProfileController.
 */
class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * ProfileController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * @param UpdateProfileRequest $request
     *
     * @return mixed
     */
    public function update(UpdateProfileRequest $request)
    {
        $output = $this->user->updateProfile(access()->id(), $request->all());

        // E-mail address was updated, user has to reconfirm
        if (is_array($output) && $output['email_changed']) {
            access()->logout();

            return redirect()->route('frontend.auth.login')->withFlashInfo(trans('strings.frontend.user.email_changed_notice'));
        }

        return redirect()->route('frontend.user.account')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
    }


    public function profileUpdate(Request $request){
          //echo '<pre>'; print_r($request->all()); die;
          $output = $this->user->updateProfile(access()->id(), $request->all());
          if($output){
           toastr()->success('Your profile has updated successfully');
          }else{
            toastr()->warning('Not Updated');
          }
        

       return back();
           }

     public function passwordChanged(Request $request){
         $user = Auth::user();
        $request->validate([
            'password' => 'nullable|required_with:password_confirmation|string|confirmed',
            'old_password' => 'required',
        ]);

    //     if(Hash::check($request->password, $user->password)) { 
    //    $output = $this->user->changePassword($request->all());
    //    toastr()->success('Your password has updated successfully');
    //                   }else{
    //         toastr()->warning('Your Request Password is not matched');             
    //                   }

    $output = $this->user->changePassword($request->all());
    if($output){
       toastr()->success('Your password has updated successfully');
                      }else{
            toastr()->warning('Your Request Password is not matched');             
                      }
       
        return back();
         }        





}
