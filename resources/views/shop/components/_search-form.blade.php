<form class="search-container" action="{{route('search')}}">
    @csrf
    <input type="text" class="search-box" name="q" placeholder="{{__('shop/layouts/headers/bottom.search_for')}}"/>
    <button type="submit" class="submit" id="search-submit">   
            <i class="fas fa-search"></i>
    </button>
</form>