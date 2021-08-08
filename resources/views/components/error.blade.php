<script>
    // error validation login and register
    var sucs = '{{Session::get('success')}}';
    var exist = '{{Session::has('success')}}';
    var ero = '{{Session::get('error')}}';
    var exist_erro = '{{Session::has('error')}}';
    var cus_err = '{{Session::get('custom_error')}}';
    var cus_exist = '{{Session::has('custom_error')}}';
    if(exist){
        alertify.set('notifier','position', 'top-right');
        alertify.success(sucs);
    }
    if(exist_erro){
        alertify.set('notifier','position', 'top-right');
        alertify.error(ero);
    }
    if(cus_exist){
        Swal.fire({
        icon: 'error',
        title: 'Vui lòng đăng nhập để tiến hành đặt hàng!',
        })
    }
</script>