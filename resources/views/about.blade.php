@extends('layouts.app')

@section('title', 'About Us')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">

@section('content')
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="hero" style="background: url('/img/bg1.webp') no-repeat center center/cover; height: 500px;">
                <div class="container text-center text-white">

                </div>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item">
            <div class="hero" style="background: url('/img/bg2.webp') no-repeat center center/cover; height: 500px;">
                <div class="container text-center text-white">

                </div>
            </div>
        </div>
        <!-- Slide 3 -->
        <div class="carousel-item">
            <div class="hero" style="background: url('/img/bg3.webp') no-repeat center center/cover; height: 500px;">
                <div class="container text-center text-white">

                </div>
            </div>
        </div>
    </div>
    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="relative w-full bg-light-white-blue">
    <div class="relative flex justify-center gap-x pad-top">
         <!-- Gọi tổng đài -->
    <div class="h-[124px] w-[276px] flex-col rounded-[16px] bg-[#FFFFFF] text-center" style="box-shadow: rgba(0, 0, 0, 0.1) 4px 4px 20px 0px;">
    <a href="tel:1900886648" class="flex items-center justify-center gap-x-3 rounded-t-[16px] p-3 text-white bg-[#00AEEF]">
      <img 
        alt="Gọi tổng đài" 
        loading="lazy" 
        width="24" 
        height="24" 
        decoding="async" 
        data-nimg="1" 
        class="h-6 w-6" 
        src="/img/phone.png" 
        style="color: transparent; width: 24px; height: 24px;"
      />
      <p class="text-base font-bold leading-normal text-white" style="margin: auto auto ">Gọi tổng đài</p>
    </a>
    <a href="tel:1900886648" class="mt-1 flex h-[60px] flex-col justify-center">
      <span class="p-1 text-center font-medium text-textSpan lg:p-4">
        Tổng đài viên của chúng tôi sẽ giải đáp các câu hỏi của bạn
      </span>
    </a>
  </div>
  <!-- Đặt lịch hẹn -->
  <div class="h-[124px] w-[276px] flex-col rounded-[16px] bg-[#FFFFFF] text-center" style="box-shadow: rgba(0, 0, 0, 0.1) 4px 4px 20px 0px;">
    <a href="/" class="flex items-center justify-center gap-x-3 rounded-t-[16px] p-3 text-white bg-[#03428E]">
      <img 
        alt="Gọi tổng đài" 
        loading="lazy" 
        width="24" 
        height="24" 
        decoding="async" 
        data-nimg="1" 
        class="h-6 w-6" 
        src="/img/lich.png" 
        style="color: transparent; width: 24px; height: 24px;"
      />
      <p class="text-base font-bold leading-normal text-white" style="margin: auto auto ">Đặt lịch hẹn</p>
    </a>
    <a href="tel:1900886648" class="mt-1 flex h-[60px] flex-col justify-center">
      <span class="p-1 text-center font-medium text-textSpan lg:p-4">
      Đặt lịch hẹn với các chuyên gia của PHENIKAAMEC
      </span>
    </a>
  </div>
  <!-- Tìm bác sĩ -->
  <div class="h-[124px] w-[276px] flex-col rounded-[16px] bg-[#FFFFFF] text-center" style="box-shadow: rgba(0, 0, 0, 0.1) 4px 4px 20px 0px;">
    <a href="/" class="flex items-center justify-center gap-x-3 rounded-t-[16px] p-3 text-white bg-[#F58220]">
      <img 
        alt="Gọi tổng đài" 
        loading="lazy" 
        width="24" 
        height="24" 
        decoding="async" 
        data-nimg="1" 
        class="h-6 w-6" 
        src="/img/icon-doctor.png" 
        style="color: transparent; width: 24px; height: 24px;"
      />
      <p class="text-base font-bold leading-normal text-white" style="margin: auto auto ">Tìm bác sĩ</p>
    </a>
    <a href="/" class="mt-1 flex h-[60px] flex-col justify-center">
      <span class="p-1 text-center font-medium text-textSpan lg:p-4">
      Chọn bác sĩ theo tên, chuyên môn và nhiều hơn thế
      </span>
    </a>
    </div>
  </div>
  <div class=" flex w-full justify-center">
    <div class="container size-full flex-col flex " style="width:1000px">
      <div class="mt-8">
        <div class="flex flex-col items-center">
          <h1 class=" text-[20px] normal-case leading-8 text-secondary-2 lg:text-[24px] lg:!uppercase text-md md:text-2xl lg:text-center">Phenikaamec - Hệ thống y tế hàn lâm đẳng cấp quốc tế</h1>
          <div class="gachchan"></div>
        </div>
        <h2 class="title-blue-1">Về chúng tôi</h2>
        <div class="grid-2">
          <div class="relative">
            <div class="article-content scrollbar-thin leading-loose overflow-y-auto h-[312px] flex-col" style="font-weight: 400;font-size: .875rem;padding-right: .5rem;">
              <p style="text-align: justify; font-size: 16px;"><span style="font-size: 16px; white-space: pre-wrap;">PhenikaaMec là hệ thống y tế hàn lâm đẳng cấp quốc tế thuộc Hệ sinh thái Chăm sóc sức khỏe Tập đoàn Phenikaa. Thành lập năm 2010, PHENIKAA hiện là tập đoàn kinh tế đa ngành với hơn 30 đơn vị thành viên hoạt động trong và ngoài nước (Mỹ, Canada…), trên các lĩnh vực cốt lõi: Công nghiệp, Công nghệ, Giáo dục đào tạo, Chăm sóc sức khỏe và các dịch vụ khác.</span></p>
              <p style="text-align: justify; font-size: 16px;"><span style="font-size: 16px; white-space: pre-wrap;">Với định hướng phát triển bền vững và nền tảng vững chắc về khoa học công nghệ, hệ thống chuyên nghiệp, con người sẵn sàng thích ứng - đổi mới, hoạt động theo mô hình Hệ sinh thái “3 Nhà”: Nhà Sản xuất Kinh doanh – Nhà Khoa học – Nhà Giáo dục, gắn kết chặt chẽ và tương hỗ lẫn nhau, Tập đoàn đang xây dựng và phát triển PHENIKAA trở thành thương hiệu tiên phong, uy tín tại Việt Nam và quốc tế về vật liệu tiên tiến, vật liệu sinh thái cao cấp, sản phẩm ; giải pháp thông minh, dịch vụ giáo dục - chăm sóc sức khỏe nhân văn và xuất sắc.</span></p>
              <p style="text-align: justify; font-size: 16px;"><span style="font-size: 16px; white-space: pre-wrap;">Sở hữu thế mạnh về nền tảng đào tạo nguồn nhân lực Y - Dược và Nghiên cứu khoa học, Tập đoàn Phenikaa phát triển hệ sinh thái khép kín trong lĩnh vực Chăm sóc sức khỏe với 4 mảng: Giáo dục và Đào tạo – Chăm sóc sức khỏe - Sản xuất kinh doanh – Công nghệ và chuyển giao.</span></p>
              <p style="text-align: justify; font-size: 16px;"><span style="font-size: 16px; white-space: pre-wrap;">PHENIKAAMEC nuôi dưỡng khát vọng cống hiến, vun đắp niềm tin, nỗ lực vươn tầm nhằm mang đến các giá trị cho xã hội và nâng cao sức khỏe cộng đồng với mục tiêu:</span></p>
            </div>
          </div>
          <img src="./img/img1.webp" alt="" class="object-cover h-[312px] rounded-xl w-full" style="">
        </div>
        <h2 class="title-blue-1">Tầm nhìn - sứ mệnh - giá trị cốt lõi</h2>
        <div class="grid-3" style="margin:20px 25px;margin-left: 85px;">
          <div class="grid-item">
              <img src="/img/img2.webp" alt="Tầm nhìn" style="height: 169.14;">
              <h3 class="hover-blue" style="cursor:pointer;">Tầm nhìn</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img3.webp" alt="Sứ mệnh">
              <h3 class="hover-blue" style="cursor:pointer;">Sứ mệnh</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img4.webp" alt="Giá trị cốt lõi">
              <h3 class="hover-blue" style="cursor:pointer;">Giá trị cốt lõi</h3>
          </div>
        </div>
        <h2 class="title-blue-1">Trang thiết bị tân tiến</h2>
        <div class="grid-3" style="margin:20px 25px;margin-left: 85px;">
          <div class="grid-item">
              <img src="/img/img5.webp" alt="Tầm nhìn">
              <h3 class="hover-blue" style="cursor:pointer;">Y học hạt nhân</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img6.webp" alt="Sứ mệnh">
              <h3 class="hover-blue" style="cursor:pointer;">Máy xạ trị</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img7.webp" alt="Giá trị cốt lõi">
              <h3 class="hover-blue" style="cursor:pointer;">Hệ thống can thiệp mạch</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img8.webp" alt="Giá trị cốt lõi">
              <h3 class="hover-blue" style="cursor:pointer;">Máy CT</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img9.webp" alt="Giá trị cốt lõi">
              <h3 class="hover-blue" style="cursor:pointer;">Máy MRI</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img10.webp" alt="Giá trị cốt lõi">
              <h3 class="hover-blue" style="cursor:pointer;">Máy X-Quang</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img11.webp" alt="Giá trị cốt lõi" style="height:179.29px;">
              <h3 class="hover-blue" style="cursor:pointer;">Máy đo đa năng</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img12.webp" alt="Giá trị cốt lõi" style="height:179.29px;">
              <h3 class="hover-blue" style="cursor:pointer;">Bộ đo mạch và huyết áp</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img13.jpeg" alt="Giá trị cốt lõi" style="height:179.29px;">
              <h3 class="hover-blue" style="cursor:pointer;">Máy chẩn đoán hiện đại</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection