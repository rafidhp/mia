{{-- <h2>Detail umkm</h2>

<label for="name">Nama Umkm: </label>
<input type="text" name="name" value="{{ $umkm[0]->umkm->user->name }}" disabled>
<br>
<label for="category">Kategori: </label>
<input type="text" name="category" value="{{ $umkm[0]->category->category_name }}" disabled>
<br>
<label for="address">Alamat: </label>
<textarea name="address" cols="30" rows="5" disabled>{{ $umkm[0]->umkm->address }}</textarea>
<br>
<label for="average_rating">Rating: </label>
<input type="number" name="average_rating" value="{{ $umkm[0]->umkm->average_rating }}" disabled>
<br><br>
<a href="{{ route('umkm.index') }}">back</a> --}}
{{-- TODO: pokonya disini nanti tinggal ambli datanya kaya yg di contoh yaa gas --}}

{{-- <br><br><br>

<h2>Ini product umkm nya</h2>

@foreach ($products as $product)
    <label for="name">Nama Produk</label>
    <input type="text" name="name" value="{{ $product->name }}" disabled>
    <br>
    <label for="description">Deskripsi</label>
    <textarea name="description" cols="30" rows="5" disabled>{{ $product->description }}</textarea>
    <br>
    <label for="price">Harga</label>
    <input type="number" name="price" value="{{ $product->price }}" disabled>
    <br><br>
@endforeach

<br><br>

<h2>Ini rating umkm nya</h2>

    <table>
        <tr>
            <th>No</th>
            <th>Penilai</th>
            <th>Rating</th>
            <th>Comment</th>
        </tr>
        @foreach ($reviews as $review)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $review->user->name }}</td>
                <td>{{ $review->rating }}</td>
                @if ($review->comment != null)
                    <td>{{ $review->comment }}</td>
                @else
                    <td>-</td>
                @endif
            </tr>
        @endforeach
        @empty($review)
            <td colspan="100%" style="text-align: center;">Belum ada data penilaian</td>
        @endempty
    </table>

    <br><br>

    @if (Auth::check())
        @if($show_review === true)
            <h3>Penilaian Anda</h3>

            <label for="rating">Penilaian: </label>
            <input type="number" name="rating" id="rating" value="{{ $user_review->rating }}" disabled>
            <br>
            <label for="comment">Komentar: </label>
            <textarea name="comment" id="comment" cols="30" rows="5" disabled>{{ $user_review->comment }}</textarea>
            <br><br>
        @else
            <form action="{{ route('review.store', ['umkm_id' => $umkm[0]->umkm->id]) }}" method="post">
                @csrf
                <label for="rating">Penilaian: </label>
                <input type="number" name="rating" id="rating" min="1" max="5">
                <br>
                <label for="comment">Komentar: </label>
                <textarea name="comment" id="comment" cols="30" rows="5"></textarea>
                <br><br>
                <button type="submit">Kirim Penilaian</button>
            </form>
            <br> --}}
            {{-- TODO: Tambahin pesan berhasilnya nanti gass --}}
        {{-- @endif
    @endif --}}

@extends('template.main')

@section('title', $umkm[0]->umkm->user->name . ' | ')

@push('css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
@endpush

@section('content')

    {{-- Mobile, Tablet View --}}
    <div class="fixed bg-[var(--soft-bg)] my-4 mx-6 py-2 px-2 w-10 rounded-4xl shadow-md">

        <a href="{{ route('umkm.index') }}">
        
          <img src="{{ asset('images/arrow-right.svg')}}" alt=""
          class="rotate-180">

        </a>

    </div>

    <section id="overview-mobile"
      class="bg-[var(--primary-600)] z-1 w-full py-4 px-6 md:py-[15px] lg:px-35 flex flex-col  h-180 items-center justify-center xl:hidden">

      <div class="flex flex-col gap-2 w-full px-5 sm:px-20 md:px-25 items-center text-[var(--primary-50)]">

        <img src="{{ asset('storage/' . $umkm[0]->umkm->umkm_picture) }}"
          alt="Foto UMKM"
          class="w-48 h-48 object-cover rounded-[18px] border-[var(--primary-50)] border-5">

        <h1 class="font-medium text-[25px] mt-4">{{ $umkm[0]->umkm->user->name }}</h1>

        <div class="bg-[var(--primary-50)] rounded-4xl text-[var(--primary-500)] px-3 py-1 text-[12px]">

          {{ $umkm[0]->category->category_name }}

        </div>

        <div class="flex text-[13px] sm:text-[15px] w-full gap-5 items-center justify-start text-start mt-5 px-0.5">

          <svg viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M9 1.62731C4.81281 1.62731 1.28068 4.97345 1.56837 9.14067C1.60963 9.73834 1.67131 10.2586 1.75535 10.6715C2.17935 12.7543 3.51026 14.8234 5.00934 16.5799C6.49565 18.3214 8.07816 19.6762 8.8959 20.3333C8.96126 20.3858 9.03874 20.3858 9.1041 20.3333C9.92184 19.6762 11.5043 18.3214 12.9907 16.5799C14.4897 14.8234 15.8206 12.7543 16.2446 10.6715C16.3287 10.2586 16.3904 9.73834 16.4316 9.14067C16.7193 4.97345 13.1872 1.62731 9 1.62731ZM0.0211454 9.25821C-0.345912 3.94141 4.12259 0 9 0C13.8774 0 18.3459 3.94141 17.9789 9.25821C17.9349 9.89504 17.8664 10.497 17.7617 11.0113C17.2534 13.5083 15.7089 15.8346 14.1464 17.6653C12.5712 19.511 10.9062 20.9351 10.0474 21.6252C9.42544 22.1249 8.57456 22.1249 7.95258 21.6252C7.09382 20.9351 5.42877 19.511 3.85358 17.6653C2.29114 15.8346 0.74659 13.5083 0.238281 11.0113C0.133594 10.497 0.0651105 9.89504 0.0211454 9.25821Z" fill="#B0D7D2"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M9 8.13653C8.28604 8.13653 7.70727 8.74367 7.70727 9.49262C7.70727 10.2416 8.28604 10.8487 9 10.8487C9.71396 10.8487 10.2927 10.2416 10.2927 9.49262C10.2927 8.74367 9.71396 8.13653 9 8.13653ZM6.15599 9.49262C6.15599 7.84494 7.4293 6.50922 9 6.50922C10.5707 6.50922 11.844 7.84494 11.844 9.49262C11.844 11.1403 10.5707 12.476 9 12.476C7.4293 12.476 6.15599 11.1403 6.15599 9.49262Z" fill="#B0D7D2"/>
          </svg>

          <p>{{ $umkm[0]->umkm->address }}</p>

        </div>

        <div id="rating"
          class="flex gap-3 md:gap-4 items-center w-full justify-start text-[var(--primary-50])] text-[14px]">

          <img src="{{ asset('images/star.svg') }}" alt=""
            class="w-5">

          <p>{{ $umkm[0]->umkm->average_rating }}</p>

        </div>

        <div id="buttons"
          class="flex flex-col gap-2 mt-7">

          <a href="#"
            class="flex gap-2 items-center py-2 px-4 bg-[var(--primary-50)] rounded-4xl text-[var(--primary-500)] font-medium">

            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current text-[var(--primary-500)]">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5 1.92308C6.65853 1.92308 1.92308 6.65853 1.92308 12.5C1.92308 14.25 2.34733 15.8981 3.09775 17.3497C3.16831 17.4862 3.20513 17.6376 3.20513 17.7913V21.7949H7.20872C7.36237 21.7949 7.51378 21.8317 7.65027 21.9023C9.10191 22.6527 10.75 23.0769 12.5 23.0769C18.3415 23.0769 23.0769 18.3415 23.0769 12.5C23.0769 6.65853 18.3415 1.92308 12.5 1.92308ZM0 12.5C0 5.59644 5.59644 0 12.5 0C19.4036 0 25 5.59644 25 12.5C25 19.4036 19.4036 25 12.5 25C10.5203 25 8.64561 24.5391 6.97985 23.718H2.24359C1.71255 23.718 1.28205 23.2875 1.28205 22.7564V18.0202C0.460924 16.3544 0 14.4797 0 12.5Z"/>
            <path d="M9.9359 12.5C9.9359 13.2081 9.36191 13.7821 8.65385 13.7821C7.94579 13.7821 7.3718 13.2081 7.3718 12.5C7.3718 11.7919 7.94579 11.218 8.65385 11.218C9.36191 11.218 9.9359 11.7919 9.9359 12.5Z"/>
            <path d="M13.7821 12.5C13.7821 13.2081 13.2081 13.7821 12.5 13.7821C11.7919 13.7821 11.218 13.2081 11.218 12.5C11.218 11.7919 11.7919 11.218 12.5 11.218C13.2081 11.218 13.7821 11.7919 13.7821 12.5Z"/>
            <path d="M17.6282 12.5C17.6282 13.2081 17.0542 13.7821 16.3462 13.7821C15.6381 13.7821 15.0641 13.2081 15.0641 12.5C15.0641 11.7919 15.6381 11.218 16.3462 11.218C17.0542 11.218 17.6282 11.7919 17.6282 12.5Z"/>
            </svg>


            <span>Hubungi Sekarang</span>

          </a>

          <a href="{{ $umkm[0]->umkm->gmaps_link }}"
            class="flex gap-2 items-center py-2 px-4 bg-[var(--primary-50)] rounded-4xl text-[var(--primary-500)] font-medium">

            <svg viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current text-[var(--primary-500)]">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 1.62731C4.81281 1.62731 1.28068 4.97345 1.56837 9.14067C1.60963 9.73834 1.67131 10.2586 1.75535 10.6715C2.17935 12.7543 3.51026 14.8234 5.00934 16.5799C6.49565 18.3214 8.07816 19.6762 8.8959 20.3333C8.96126 20.3858 9.03874 20.3858 9.1041 20.3333C9.92184 19.6762 11.5043 18.3214 12.9907 16.5799C14.4897 14.8234 15.8206 12.7543 16.2446 10.6715C16.3287 10.2586 16.3904 9.73834 16.4316 9.14067C16.7193 4.97345 13.1872 1.62731 9 1.62731ZM0.0211454 9.25821C-0.345912 3.94141 4.12259 0 9 0C13.8774 0 18.3459 3.94141 17.9789 9.25821C17.9349 9.89504 17.8664 10.497 17.7617 11.0113C17.2534 13.5083 15.7089 15.8346 14.1464 17.6653C12.5712 19.511 10.9062 20.9351 10.0474 21.6252C9.42544 22.1249 8.57456 22.1249 7.95258 21.6252C7.09382 20.9351 5.42877 19.511 3.85358 17.6653C2.29114 15.8346 0.74659 13.5083 0.238281 11.0113C0.133594 10.497 0.0651105 9.89504 0.0211454 9.25821Z""/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 8.13653C8.28604 8.13653 7.70727 8.74367 7.70727 9.49262C7.70727 10.2416 8.28604 10.8487 9 10.8487C9.71396 10.8487 10.2927 10.2416 10.2927 9.49262C10.2927 8.74367 9.71396 8.13653 9 8.13653ZM6.15599 9.49262C6.15599 7.84494 7.4293 6.50922 9 6.50922C10.5707 6.50922 11.844 7.84494 11.844 9.49262C11.844 11.1403 10.5707 12.476 9 12.476C7.4293 12.476 6.15599 11.1403 6.15599 9.49262Z""/>
            </svg>

            <span>Lihat Detail Lokasi</span>

          </a>

        </div>

      </div>

    </section>

    <section id="overview-desktop"
      class="bg-[var(--primary-600)] z-1 py-4 px-6 lg:px-35 flex-col h-180 items-center justify-center hidden xl:flex">

      <div class="flex gap-15 justify-between items-center">

        <img src="{{ asset('storage/' . $umkm[0]->umkm->umkm_picture) }}"
          alt="Foto UMKM"
          class="w-58 h-58 object-cover rounded-[18px] border-[var(--primary-50)] border-5">

        <div class="flex flex-col flex-[4] gap-3 text-[var(--primary-50)] items-start justify-start">

          <h1 class="font-medium text-[40px] mt-4">{{ $umkm[0]->umkm->user->name }}</h1>

          <div class="bg-[var(--primary-50)] rounded-4xl text-[var(--primary-500)] px-4 py-1 text-[14px]">

            {{ $umkm[0]->category->category_name }}

          </div>

          <div class="flex text-[13px] sm:text-[15px] w-full gap-5 items-center justify-start text-start mt-5 px-0.5">

            <svg viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-10">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 1.62731C4.81281 1.62731 1.28068 4.97345 1.56837 9.14067C1.60963 9.73834 1.67131 10.2586 1.75535 10.6715C2.17935 12.7543 3.51026 14.8234 5.00934 16.5799C6.49565 18.3214 8.07816 19.6762 8.8959 20.3333C8.96126 20.3858 9.03874 20.3858 9.1041 20.3333C9.92184 19.6762 11.5043 18.3214 12.9907 16.5799C14.4897 14.8234 15.8206 12.7543 16.2446 10.6715C16.3287 10.2586 16.3904 9.73834 16.4316 9.14067C16.7193 4.97345 13.1872 1.62731 9 1.62731ZM0.0211454 9.25821C-0.345912 3.94141 4.12259 0 9 0C13.8774 0 18.3459 3.94141 17.9789 9.25821C17.9349 9.89504 17.8664 10.497 17.7617 11.0113C17.2534 13.5083 15.7089 15.8346 14.1464 17.6653C12.5712 19.511 10.9062 20.9351 10.0474 21.6252C9.42544 22.1249 8.57456 22.1249 7.95258 21.6252C7.09382 20.9351 5.42877 19.511 3.85358 17.6653C2.29114 15.8346 0.74659 13.5083 0.238281 11.0113C0.133594 10.497 0.0651105 9.89504 0.0211454 9.25821Z" fill="#B0D7D2"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 8.13653C8.28604 8.13653 7.70727 8.74367 7.70727 9.49262C7.70727 10.2416 8.28604 10.8487 9 10.8487C9.71396 10.8487 10.2927 10.2416 10.2927 9.49262C10.2927 8.74367 9.71396 8.13653 9 8.13653ZM6.15599 9.49262C6.15599 7.84494 7.4293 6.50922 9 6.50922C10.5707 6.50922 11.844 7.84494 11.844 9.49262C11.844 11.1403 10.5707 12.476 9 12.476C7.4293 12.476 6.15599 11.1403 6.15599 9.49262Z" fill="#B0D7D2"/>
            </svg>

            <p>{{ $umkm[0]->umkm->address }}</p>

          </div>

          <div id="rating"
            class="flex gap-3 md:gap-4 items-center w-full justify-start text-[var(--primary-50])] text-[18px]">

            <img src="{{ asset('images/star.svg') }}" alt=""
              class="w-5 xl:w-8">

            <p>{{ $umkm[0]->umkm->average_rating }}</p>

          </div>

        </div>

        <div id="buttons"
            class="flex flex-col flex-[3] gap-2 mt-7">

          <a href="#"
            class="flex gap-2 items-center py-2 px-4 bg-[var(--primary-50)] rounded-4xl text-[var(--primary-500)] justify-center font-medium">

            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current text-[var(--primary-500)]">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5 1.92308C6.65853 1.92308 1.92308 6.65853 1.92308 12.5C1.92308 14.25 2.34733 15.8981 3.09775 17.3497C3.16831 17.4862 3.20513 17.6376 3.20513 17.7913V21.7949H7.20872C7.36237 21.7949 7.51378 21.8317 7.65027 21.9023C9.10191 22.6527 10.75 23.0769 12.5 23.0769C18.3415 23.0769 23.0769 18.3415 23.0769 12.5C23.0769 6.65853 18.3415 1.92308 12.5 1.92308ZM0 12.5C0 5.59644 5.59644 0 12.5 0C19.4036 0 25 5.59644 25 12.5C25 19.4036 19.4036 25 12.5 25C10.5203 25 8.64561 24.5391 6.97985 23.718H2.24359C1.71255 23.718 1.28205 23.2875 1.28205 22.7564V18.0202C0.460924 16.3544 0 14.4797 0 12.5Z"/>
            <path d="M9.9359 12.5C9.9359 13.2081 9.36191 13.7821 8.65385 13.7821C7.94579 13.7821 7.3718 13.2081 7.3718 12.5C7.3718 11.7919 7.94579 11.218 8.65385 11.218C9.36191 11.218 9.9359 11.7919 9.9359 12.5Z"/>
            <path d="M13.7821 12.5C13.7821 13.2081 13.2081 13.7821 12.5 13.7821C11.7919 13.7821 11.218 13.2081 11.218 12.5C11.218 11.7919 11.7919 11.218 12.5 11.218C13.2081 11.218 13.7821 11.7919 13.7821 12.5Z"/>
            <path d="M17.6282 12.5C17.6282 13.2081 17.0542 13.7821 16.3462 13.7821C15.6381 13.7821 15.0641 13.2081 15.0641 12.5C15.0641 11.7919 15.6381 11.218 16.3462 11.218C17.0542 11.218 17.6282 11.7919 17.6282 12.5Z"/>
            </svg>

            <span>Hubungi Sekarang</span>

          </a>

          <a href="{{ $umkm[0]->umkm->gmaps_link }}"
            class="flex gap-2 items-center py-2 px-4 bg-[var(--primary-50)] rounded-4xl text-[var(--primary-500)] justify-center font-medium">

            <svg viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current text-[var(--primary-500)]">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 1.62731C4.81281 1.62731 1.28068 4.97345 1.56837 9.14067C1.60963 9.73834 1.67131 10.2586 1.75535 10.6715C2.17935 12.7543 3.51026 14.8234 5.00934 16.5799C6.49565 18.3214 8.07816 19.6762 8.8959 20.3333C8.96126 20.3858 9.03874 20.3858 9.1041 20.3333C9.92184 19.6762 11.5043 18.3214 12.9907 16.5799C14.4897 14.8234 15.8206 12.7543 16.2446 10.6715C16.3287 10.2586 16.3904 9.73834 16.4316 9.14067C16.7193 4.97345 13.1872 1.62731 9 1.62731ZM0.0211454 9.25821C-0.345912 3.94141 4.12259 0 9 0C13.8774 0 18.3459 3.94141 17.9789 9.25821C17.9349 9.89504 17.8664 10.497 17.7617 11.0113C17.2534 13.5083 15.7089 15.8346 14.1464 17.6653C12.5712 19.511 10.9062 20.9351 10.0474 21.6252C9.42544 22.1249 8.57456 22.1249 7.95258 21.6252C7.09382 20.9351 5.42877 19.511 3.85358 17.6653C2.29114 15.8346 0.74659 13.5083 0.238281 11.0113C0.133594 10.497 0.0651105 9.89504 0.0211454 9.25821Z">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 8.13653C8.28604 8.13653 7.70727 8.74367 7.70727 9.49262C7.70727 10.2416 8.28604 10.8487 9 10.8487C9.71396 10.8487 10.2927 10.2416 10.2927 9.49262C10.2927 8.74367 9.71396 8.13653 9 8.13653ZM6.15599 9.49262C6.15599 7.84494 7.4293 6.50922 9 6.50922C10.5707 6.50922 11.844 7.84494 11.844 9.49262C11.844 11.1403 10.5707 12.476 9 12.476C7.4293 12.476 6.15599 11.1403 6.15599 9.49262Z">
            </svg>

            <span>Lihat Detail Lokasi</span>

          </a>

        </div>

      </div>

    </div>

    </section>

    <section id="information"
      class="flex flex-col xl:flex-row xl:justify-start gap-3 w-screen px-5 md:px-35 bg-[var(--bg)] py-6 xl:py-12">

        <div id="informasi-umum-mobile"
          class="flex justify-between w-full px-5 shadow-md rounded-lg xl:hidden">

          <div class="flex flex-col py-4">

            <div class="bg-[var(--bg)] flex items-center gap-2 mb-2 text-[var(--caption)]">

              <img src="{{ asset('images/jam.svg') }}" alt=""
                class="w-4">

              <span class="text-[12px]">Jam Operasional</span>

            </div>

            <span class="text-[12px] text-[var(--primary-500)] font-semibold">{{ $umkm[0]->umkm->open_days }}</span>
            <span class="text-[12px] text-[var(--primary-500)] font-semibold">{{ $umkm[0]->umkm->open_time . " - " .  $umkm[0]->umkm->close_time }}</span>

          </div>

          <div class="flex flex-col rounded-lg py-4 px-5 justify-center gap-3">

            <div class="flex gap-2">

              <img src="{{ asset('images/telepon.svg') }}" alt=""
              class="w-4">

              <span class="text-[10px] text-[var(--primary-500)]">{{$umkm[0]->umkm->phone_number}}</span>

            </div>

            <div class="flex gap-2">

              <img src="{{ asset('images/email.svg') }}" alt=""
              class="w-4">

              <span class="text-[10px] text-[var(--primary-500)]">{{$umkm[0]->umkm->user->email}}</span>

            </div>

          </div>

        </div>

        <div class="flex flex-col flex-[5]">

          <div id="tentang-kami"
          class="flex flex-col w-full gap-3 py-6 px-5 xl:px-8 xl:py-10 shadow-md rounded-lg">

            <h2 class="font-semibold text-[var(--primary-500)] xl:text-[30px]">Tentang Kami</h2>

            <p class="text-[11px] xl:text-[14px] text-[var(--primary-500)]">{{ $umkm[0]->umkm->description }}</p>

          </div>

          <div id="lokasi-kami"
            class="flex flex-col w-full gap-3 py-6 px-5 xl:px-8 xl:py-10 shadow-md rounded-lg">

            <h2 class="font-semibold text-[var(--primary-500)] text-[30px]">Lokasi Kami</h2>

            <div id="map" style="height: 300px;"
              class="rounded-[15px]"></div>

          </div>

        </div>

        <div id="informasi-umum-desktop"
          class="hidden w-full px-5 py-5 shadow-md h-60 rounded-lg xl:flex flex-col flex-[1]">

          <div class="flex flex-col py-4">

            <div class="bg-[var(--bg)] flex items-center gap-2 mb-2 text-[var(--caption)]">

              <img src="{{ asset('images/jam.svg') }}" alt=""
                class="w-4">

              <span class="text-[15px]">Jam Operasional</span>

            </div>

            <span class="text-[14px] text-[var(--primary-500)] font-semibold">{{ $umkm[0]->umkm->open_days }}</span>
            <span class="text-[14px] text-[var(--primary-500)] font-semibold">{{ $umkm[0]->umkm->open_time . " - " .  $umkm[0]->umkm->close_time }}</span>

          </div>

          <div class="flex flex-col rounded-lg py-4 justify-start gap-3">

            <div class="flex gap-2">

              <img src="{{ asset('images/telepon.svg') }}" alt=""
              class="w-6">

              <span class="text-[13px] text-[var(--primary-500)]">{{$umkm[0]->umkm->phone_number}}</span>

            </div>

            <div class="flex gap-2">

              <img src="{{ asset('images/email.svg') }}" alt=""
              class="w-6">

              <span class="text-[13px] text-[var(--primary-500)]">{{$umkm[0]->umkm->user->email}}</span>

            </div>

          </div>

        </div>
        
    </section>

    <x-footer />

    @push('script')
      <script>
          let lat = {{ $umkm[0]->umkm->latitude }};
          let lng = {{ $umkm[0]->umkm->longitude }};

          var map = L.map('map').setView([lat, lng], 15);

          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
              maxZoom: 19,
          }).addTo(map);

          L.marker([lat, lng]).addTo(map)
              .bindPopup("{{ $umkm[0]->umkm->user->name }}");

      </script>
    @endpush


@endsection