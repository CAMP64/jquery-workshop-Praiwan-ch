<?php

namespace App\Controllers;

class MID extends BaseController
{
    public function show_input()    
    {
        return view('v_show_input');
    }

    public function show_value()    
    {
        $data['name_title'] = $this->request->getPost('name_title');
        $data['accept1'] = $this->request->getPost('accept1');
        $data['accept2'] = $this->request->getPost('accept2');
        $data['accept3'] = $this->request->getPost('accept3');
        $data['accept4'] = $this->request->getPost('accept4');
        $data['Fname'] = $this->request->getPost('Fname');
        $data['Lname'] = $this->request->getPost('Lname');
        $data['date'] = $this->request->getPost('date');
        $data['email'] = $this->request->getPost('email');
        $data['gender'] = $this->request->getPost('gender');
        $data['phone'] = $this->request->getPost('phone');
        $data['address'] = $this->request->getPost('address');
        $data['symptom'] = $this->request->getPost('symptom');
        $data['age'] = $this->request->getPost('age');
        $data['province'] = $this->request->getPost('province');
        $data['district'] = $this->request->getPost('district');

        $file = $this-> request->getFile('image');
        if($file->isValid())
        {
            $image_name = $file->getRandomName();
            $file->move('./picture',$image_name);
        }
        $data['image'] = $image_name;

        return view('v_show_value',$data);
    }

}

