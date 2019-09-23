<?php

    Class Test extends CI_Controller
    {



        public function index()
        {   
            $this->load->view('students');
            
        }

        public function show()
        {
   
             // Datatables Variables
   
             $draw = intval($this->input->get("draw"));
             $start = intval($this->input->get("start"));
             $length = intval($this->input->get("length"));
   
   
             $books = $this->db->get("students"); 
   
             $data = array();
   
             foreach($books->result() as $r) {
   
                  $data[] = array(
                       $r->id,
                       $r->sname,
                       $r->sage,
                       $r->sgender,
                       
                  );
   
                  
             }
   
             $output = array(
                  "draw" => $draw,
                    "recordsTotal" => $books->num_rows(),
                    "recordsFiltered" => $books->num_rows(),
                    "data" => $data
               );
             echo json_encode($output);
   
   
             //exit();
        }


        public function showStudents()
     {

          // Datatables Variables

          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


          $books = $this->db->get("students"); 

          $data = array();

          foreach($books->result() as $r) {

               $data[] = array(
                    $r->id,
                    $r->sname,
                    $r->sage,
                    $r->sgender,
                     '<button data-toggle="modal" class="btnEdit" data-target="#editModal" >Update</button>',        
                     '<button  onclick="destroy(id='.$r->id.')">Delete</button>',        
                     
                             

               );

               
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $books->num_rows(),
                 "recordsFiltered" => $books->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);

     } 

     public function store()
     {
        
            $data=array(
                'sname'=>$this->input->post('sname'),
                'sage'=>$this->input->post('sage'),
                'sgender'=>$this->input->post('sgender')
            );

           $this->db->insert('students',$data);
            redirect('test');
          
        
     }

     public function edit()
     {
          $id=$_REQUEST['id'];
         
          $query=$this->db->get_where("students",array('id'=>$id));
          $data['students']=$query->row_array();
          
          echo json_encode($data);
      }

      public function update()
      {

          $id=$_REQUEST['id'];
          $data=array(
               'sname'=>$this->input->post('sname'),
               'sage'=>$this->input->post('sage')
           );
   
            $this->db->where('id',$id);
             $this->db->update('students',$data);
             
      }

     public function destroy()
     {
          $sid=$_REQUEST['id'];
          $this->db->delete("students","id=$sid");
          redirect('test');
     }
     
    }

?>