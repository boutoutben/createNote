@if(session()->get("user")== ""){
    return redirect(route(home.index));
}
@endif