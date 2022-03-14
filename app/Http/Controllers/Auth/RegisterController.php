<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\SubCategory;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\elementType;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    





    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
       
        return Validator::make($data, [
            /*'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'phone'=>'required',
            'address'=>'required',
            'experiance'=>'required'*/

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'registeras' =>'required',
            'phone'=>'required',
            'address'=>'required',
            'experiance'=>'required_if:registeras,SVP',
            'price'=>'required_if:registeras,SVP',
            'category'=>'required_if:registeras,SVP',
            'subcategory'=> 'required_if:registeras,SVP',
           'photo'=>'required_if:registeras,SVP',

           'province' =>'required',

           
        ],[
           
           
               'name.required'=>'Enter name',

               'email.required'=>'Enter email',
               'email.email'=>'must bee an Email(missisng @)',
               'email.unique'=>'This Email is already Exists',

               'password.required'=>'Enter password',
               'password.min'=>'Must greater than 8',
               'password.confirmed'=>'The password and its confirmation  not match',

               'phone.required'=>'Enter the phone number',
               'address.required'=>'Enter the address',
               'experiance.required_if'=>'Enter the years of Experiance',

               'experiance.required'=>'Enter the experiance',

               'price.required_if'=>'Insert a price',

               'category.required_if'=>'Select The Category ',
               'subcategory.required_if'=>'Select  SubCategory ',

               'photo.required_if'=>'Select a Photo',
               'province.required' =>'Select your province',

               
              
           
        ]);
    }

   

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) // array $data Request $request
    {

        
        $registeras = $data['registeras'] ==='SVP' ? 'SVP':'CST';

 /*    if( $registeras =='SVP')
     {
        $category = Null;
      
        $subcategory = Null;
*/        
 $category = $data['registeras'] ==='SVP' ? $data['category'] : Null;
 $subcategory = $data['registeras'] ==='SVP' ? $data['subcategory'] : Null;

 $experiance = $data['registeras'] ==='SVP' ? $data['experiance'] : Null;

 $prc = $data['registeras'] ==='SVP' ? $data['price'] : Null;

 $photo = $data['registeras']==='SVP' ?$data['photo'] : Null;



        $user = User::create([
          
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'],
            'utype' => $registeras,
         //   'experiance' => $data['experiance'],
            'experiance' =>$experiance,
            'pricee'=>$prc,
            'category'=> $category,
            'sub_category'=>$subcategory,

            'province' => $data['province'],

            
          //  'price'=>$data['price']

        ]);
        
  // insert img
  if($data['registeras']==='SVP'){

  
  if(request()->hasfile('photo'))
  {
      foreach(request()->file('photo') as $file)
      {
          $name = $file->getClientOriginalName();
          $file->storeAs('attachments/service provider/', $file->getClientOriginalName(),'upload_attachments');

          // insert in image_table
          $images= new Image();
          $images->filename=$name;
          $images->imageable_id= $user->id;
          $images->imageable_type = 'App\User';
          $images->save();
      }
     
   //   return $user;

    }
  }
  elseif($data['registeras']==='CST'){
    $Image_s= new Image();
    $Image_s->filename=$photo;
    $Image_s->imageable_id= $user->id;
    $Image_s->imageable_type = 'App\User';
    $Image_s->save();

  }
  return $user;
       
    }}


