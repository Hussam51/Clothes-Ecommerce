".item-quantity".on("change",function(a){let t=$(this).data("id");$.ajax({url:"/cart/"+t,method:"put",data:{quantity:$(this).val(),_token:csrf_token}})});
