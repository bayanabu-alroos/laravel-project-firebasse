<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;


class ContactController extends Controller
{

    private $database;
    private $tablename;
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'contacts';
    }

    public function index(){
        $contacts = $this->database->getReference($this->tablename)->getValue();
        return view('firebase.contact.index',compact('contacts'));
    }

    public function create(){
        return view('firebase.contact.create');
    }

    public function store(Request $request){
        $postData = [
            'fname'=> $request-> first_name,
            'lname'=> $request-> last_name,
            'phone'=> $request-> phone,
            'email'=> $request-> email,
            'message'=> $request-> message,
        ];
        $postRef =  $this->database->getReference($this->tablename)->push($postData);
        if ($postRef) {
            return redirect('contacts')->with('status','Contact Added Successfully');
        }else{
            return redirect('contacts')->with('status','Contact  Not Added ');
        }
    }

    public function edit($id){
        $key =$id;
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if ($editdata) {
            return view('firebase.contact.edit',compact('editdata','key'));
        }else{
            return redirect('contacts')->with('status','Contact Id Not Found');
        }
    }

    public function update(Request $request,$id){
        $key =$id;
        $updateData = [
            'fname'=> $request-> first_name,
            'lname'=> $request-> last_name,
            'phone'=> $request-> phone,
            'email'=> $request-> email,
            'message'=> $request-> message,
        ];
        $res_updated = $this->database->getReference($this->tablename.'/'.$key)->update($updateData);
        if ($res_updated) {
            return redirect('contacts')->with('status','Contact Updated Successfully');
        }else{
            return redirect('contacts')->with('status','Contact Not Updated Successfully');
        }
    }

    public function destroy($id){
        $key = $id;
        $del_data = $this->database->getReference($this->tablename.'/'.$key)->remove();
        if ($del_data) {
            return redirect('contacts')->with('status','Contact Delete Successfully');
        }else{
            return redirect('contacts')->with('status','Contact Not Delete Successfully');
        }
    }
}
