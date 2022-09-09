@extends('backend.layouts.app')
@section('title', 'User Contact List')

@section('content')


<div class="card">
    <div class="card-body">
		<table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
            <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th> 
                <th>City</th>
                <th>Comment</th>
                <th>Status</th>  
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($contact_list as $contact_lists)
          
                <tr>
                    <td>{{$contact_lists['first_name']}}</td> 
                    <td class="text-wrap">{{$contact_lists['phone']}}</td> 
                    <td class="text-wrap">{{$contact_lists['email']}}</td> 
                    <td class="text-wrap">{{$contact_lists['city']}}</td>
                    <td class="text-wrap">{{$contact_lists['comment']}}</td>
                    <td class="text-wrap">
                        @if($contact_lists['status'] == 0)
                            <span class="badge bg-danger">No Reply</span>
                        @else
                        <span class="badge bg-success">Replied</span>
                        @endif
                    </td> 
                    <td class="text-wrap"><a href="" data-name="{{$contact_lists['first_name']}}" data-email="{{$contact_lists['email']}}" data-id="{{$contact_lists['id']}}" class="btn btn-primary conatct_reply" data-bs-toggle="modal" data-bs-target="#exampleModal">Reply</a></td>
                </tr> 
              @endforeach 
            </tbody>
        </table>
    </div>
</div> 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Message Reply</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST" id="reply_message_new">
        @csrf
        <div class="modal-body">
            <b>Name:</b> <h4 id="contact_name"></h4>
            <b>Email:</b><h4 id="contact_email_new"></h4>
            <label for="">Message</label>
            <input type="hidden" name="contact_id" value="" id="contact_id">
            <input type="hidden" name="contact_email" value="" id="contact_email">
            <textarea name="message" id="" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary reply_message" >Reply</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $( document ).ready(function() {  
    $('.conatct_reply').click(function(e){
            var contact_id=$(this).attr('data-id');
            var contact_email=$(this).attr('data-email');
            var contact_name=$(this).attr('data-name');
            $('#contact_name').html(contact_name);
            $('#contact_email_new').html(contact_email);
            $('#contact_id').val(contact_id);
            $('#contact_email').val(contact_email);
    });

    $('.reply_message').click(function(e){
        var data=$('#reply_message_new').serialize();
        jQuery.ajax({
              url: "{{route('backend.reply_user_contact')}}",
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              type: 'post',
              async: false,
              data:data,
              success: function(data) {
                  $('#exampleModal').hide(); 
                  location.reload();
              }
          }); 
    });

});
</script>
@endsection

