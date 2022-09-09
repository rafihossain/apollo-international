<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Events\Backend\UserCreated;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Image;
use File;
use DB;


class UserManageController extends Controller
{
    
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('permission:editor_permission');
        //$this->middleware('role:admin|writer')->only('testmiddleware');
        //$this->module_name = 'editor';
         $this->module_name = 'users';
    }
    
    protected function userValidate($request){
        $validated = $request->validate([
            'user_name' => 'required',
            'email' => 'required|unique:users,email',
            'user_phone' => 'required',
            'user_role' => 'required',
            'user_password' => 'required',
            'profile_image' => 'required'
        ]);

    }

    protected function userupdateValidate($request){
        $validated = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required',
            'user_phone' => 'required',
            'user_role' => 'required',
        ]);

    }

    protected function userupdatenewValidate($request){
        $validated = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|unique:users,email',
            'user_phone' => 'required',
            'user_role' => 'required',
        ]);

    }

    protected function userImageUpload($request){

        $profile_image = $request->file('profile_image');
        $image = Image::make($profile_image);
        $fileType = $profile_image->getClientOriginalExtension();
        $imageName = 'user_'.time().'_'.rand(10000, 999999).'.'.$fileType;
        $directory = 'admin/image/user/';
        $imageUrl = $directory.$imageName;
        $image->save($imageUrl);
        
        $thumbnail = $directory."thumbnail/".$imageName;
        $image->resize(200, 200, function($constraint) {
            $constraint->aspectRatio();
        });
        $image->save($thumbnail);

        return $imageName;
    }

    public function create_user()
    {
       return view('backend.users.create_user');
    }

    public function save_user(Request $req)
    {
        //For Validation--------------
        $this->userValidate($req);
        $imageUrl = $this->userImageUpload($req);

        // $user=new User(); 
        // $user->name=$req->user_name;
        // $user->first_name=$req->user_name;
        // $user->last_name=$req->user_name;
        // $user->email=$req->user_email;
        // $user->mobile=$req->user_phone;
        // $user->status=$req->user_role;
        // $user->profile_image=$imageUrl;
        // $user->password=Hash::make($req->user_password);
        // $user->save();
        
        $module_name = $this->module_name;
        $module_name_singular = Str::singular($module_name);

        $data_array = $req->except('_token', 'roles', 'permissions', 'password_confirmation');
        $data_array['name'] = $req->user_name;
        $data_array['first_name'] = $req->user_name;
        $data_array['last_name'] = $req->user_name;
        $data_array['mobile'] = $req->user_phone;
        $data_array['user_type'] = $req->user_role;
        $data_array['profile_image'] = $imageUrl;
        $data_array['password'] = Hash::make($req->user_password);

        if ($req->confirmed == 1) {
            $data_array = Arr::add($data_array, 'email_verified_at', Carbon::now());
        } else {
            $data_array = Arr::add($data_array, 'email_verified_at', null);
        }

        $$module_name_singular = User::create($data_array);
        $user_id = DB::getPdo()->lastInsertId();

           if($req->user_role == 3)
            {
                $roles = Role::select('name')->where('id', 8)->get()->toArray();
                $permissions = Permission::select('name')->whereIn('id', [1, 40])->get()->toArray();
            }
            else
            {
                $roles = Role::select('name')->where('id', 7)->get()->toArray();
                $permissions = Permission::select('name')->whereIn('id', [1, 39])->get()->toArray();
            }

            $permission = array();
            $role = array();
            foreach ($roles as $getrole) {
                $role[] = $getrole['name'];
            }

            foreach ($permissions as $getper) {
                $permission[] = $getper['name'];
            }

            $module_name_singular = Str::singular('user');

            if (isset($roles)) {
                $$module_name_singular->syncRoles($roles);
            } else {
                $roles = [];
                $$module_name_singular->syncRoles($roles);
            }

            // Sync Permissions
            if (isset($permissions)) {
                $$module_name_singular->syncPermissions($permissions);
            } else {
                $permissions = [];
                $$module_name_singular->syncPermissions($permissions);
            }
            
        // Username
        $id = $$module_name_singular->id;
        $username = config('app.initial_username') + $id;
        $$module_name_singular->username = $username;
        $$module_name_singular->save();

        event(new UserCreated($$module_name_singular));

        return redirect()->route('backend.allusers')->with('success', 'Successfully Inserted');  
    }

    public function all_users()
    {
        $user=User::whereIn('user_type',[2,3,4])->get()->toArray();
        // echo '<pre>';
        // print_r($users);
        // die();
        return view('backend.users.all_users',compact('user'));
    }

    public function edit_user($id)
    {
       $user=User::find($id)->toArray();

       return view('backend.users.edit_user',compact('user')); 
    }

    public function update_user(Request $req)
    {
        $user_id=$req->user_id;
        $password=$req->password;
        $re_password=$req->re_password;

        $user=User::find($user_id)->toArray();

        if($user['email'] == $req->user_email)
        {
            $this->userupdateValidate($req);
        }
        else
        {
            $this->userupdatenewValidate($req);
        }

        if(($password != '') && ($re_password != ''))
        {
            if($password == $re_password)
            {
                $profile_image = $req->file('profile_image');

                if($profile_image)
                {
                    $users=User::find($user_id)->toArray(); 
                    if ($users['profile_image'] != '') {

                        if (File::exists('admin/image/user/'.$users['profile_image'])) {
                            unlink('admin/image/user/'.$users['profile_image']);
                        }
                        if (File::exists('admin/image/user/thumbnail/'.$users['profile_image'])) {
                            unlink('admin/image/user/thumbnail/'.$users['profile_image']);
                        }
                    }
                    $imageUrl = $this->userImageUpload($req);
                    $user=User::find($user_id); 
                    $user->name=$req->user_name;
                    $user->first_name=$req->user_name;
                    $user->last_name=$req->user_name;
                    $user->email=$req->user_email;
                    $user->mobile=$req->user_phone;
                    $user->status=$req->user_role;
                    $user->profile_image=$imageUrl;
                    $user->password=Hash::make($req->password);
                    $user->save();
        
                }
                else
                {
                    $user=User::find($user_id); 
                    $user->name=$req->user_name;
                    $user->first_name=$req->user_name;
                    $user->last_name=$req->user_name;
                    $user->email=$req->user_email;
                    $user->mobile=$req->user_phone;
                    $user->status=$req->user_role;
                    $user->password=Hash::make($req->password);
                    $user->save();
    
                }

                return redirect()->route('backend.allusers')->with('success', 'Successfully Updated');
            }
            else
            {
               return redirect()->route('backend.user-edit',$user_id)->with('do_not_match', 'Password did not match');
            }
        }
        else
        {
                

            $profile_image = $req->file('profile_image');

            if($profile_image)
            {
               
                $users=User::find($user_id)->toArray(); 
                if ($users['profile_image'] != '') {

                    if (File::exists('admin/image/user/'.$users['profile_image'])) {
                        unlink('admin/image/user/'.$users['profile_image']);
                    }
                    if (File::exists('admin/image/user/thumbnail/'.$users['profile_image'])) {
                        unlink('admin/image/user/thumbnail/'.$users['profile_image']);
                    }
                }
                $imageUrl = $this->userImageUpload($req);
                $user=User::find($user_id); 
                $user->name=$req->user_name;
                $user->first_name=$req->user_name;
                $user->last_name=$req->user_name;
                $user->email=$req->user_email;
                $user->mobile=$req->user_phone;
                $user->status=$req->user_role;
                $user->profile_image=$imageUrl;
                $user->save();
    
            }
            else
            {
                $user=User::find($user_id); 
                $user->name=$req->user_name;
                $user->first_name=$req->user_name;
                $user->last_name=$req->user_name;
                $user->email=$req->user_email;
                $user->mobile=$req->user_phone;
                $user->status=$req->user_role;
                $user->save();

            }

            return redirect()->route('backend.allusers')->with('success', 'Successfully Updated');
        }
        
    }

    public function delete_user($id)
    {
         $data = User::find($id);

        if ($data->profile_image != '') {

            if (File::exists('admin/image/user/'.$data->profile_image)) {
                unlink('admin/image/user/'.$data->profile_image);
            }
            if (File::exists('admin/image/user/thumbnail/'.$data->profile_image)) {
                unlink('admin/image/user/thumbnail/'.$data->profile_image);
            }
        }
        $delete=DB::table('users')->where('id',$id)->delete();

        if($delete)
        {            
          return redirect()->route('backend.allusers')->with('delete', 'Successfully Deleted');  
        } 
        
    }
}
