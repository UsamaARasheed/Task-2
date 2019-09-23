function getdata($table,$url)
{
       $($table).DataTable({
       
       
       "ajax": {
            url : $url ,
           "order": [[1, 'desc']],
           type : 'GET'
       },
   });

}


function realtime($method,$url,$data,$body)
{
    

        $.ajax({
            method:$method,
            'url':$url,
            data:$data,
           success:function(data)
            {
               $body();
               
            }


      });

}
