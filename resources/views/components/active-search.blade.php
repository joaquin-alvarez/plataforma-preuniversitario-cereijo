<div>
    <label class="w-full">
        <svg class="pointer-events-none absolute z-10 my-3.5 ms-4 stroke-current opacity-60 text-base-content" width="18" height="18" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        <input type="search" name="search" placeholder="{{ $placeholder }}" class="pl-12 block input input-bordered w-full max-w-xs" 
        hx-get="{{ route( $route ) }}"
        hx-params='{"search": this.value}'
        hx-target="#response"
        hx-trigger="input changed delay:500ms, search"
        />
      </label>
</div>