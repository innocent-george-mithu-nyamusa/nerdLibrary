
<div id="change-cover-modal" class="modal change-cover-modal is-medium has-light-bg">
    <div class="modal-background"></div>
    <div class="modal-content">

        <div class="card">
            <div class="card-heading">
                <h3>Update Cover</h3>
                <!-- Close X button -->
                <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                </div>
            </div>
            <div class="card-body">
                <!-- Placeholder -->
                <div class="selection-placeholder">
                    <div class="columns">
                        <div class="column is-6">
                            <!-- Selection box -->
                            <div class="selection-box modal-trigger" data-modal="upload-crop-cover-modal">
                                <div class="box-content">
                                    <img src="/assets/img/illustrations/profile/upload-cover.svg" alt="">
                                    <div class="box-text">
                                        <span>Upload</span>
                                        <span>From your computer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <!-- Selection box -->
                            <div class="selection-box modal-trigger" data-modal="user-photos-modal">
                                <div class="box-content">
                                    <img src="/assets/img/illustrations/profile/change-cover.svg" alt="">
                                    <div class="box-text">
                                        <span>Choose</span>
                                        <span>From your photos</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Change profile pic modal -->
<!--html/partials/pages/profile/timeline/modals/change-profile-pic-modal.html-->
<div id="change-profile-pic-modal" class="modal change-profile-pic-modal is-medium has-light-bg">
    <div class="modal-background"></div>
    <div class="modal-content">

        <div class="card">
            <div class="card-heading">
                <h3>Update Profile Picture</h3>
                <!-- Close X button -->
                <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                </div>
            </div>
            <div class="card-body">
                <!-- Placeholder -->
                <div class="selection-placeholder">
                    <div class="columns">
                        <div class="column is-6">
                            <!-- Selection box -->
                            <div class="selection-box modal-trigger" data-modal="upload-crop-profile-modal">
                                <div class="box-content">
                                    <img src="/assets/img/illustrations/profile/change-profile.svg" alt="">
                                    <div class="box-text">
                                        <span>Upload</span>
                                        <span>From your computer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <!-- Selection box -->
                            <div class="selection-box modal-trigger" data-modal="user-photos-modal">
                                <div class="box-content">
                                    <img src="/assets/img/illustrations/profile/upload-profile.svg" alt="">
                                    <div class="box-text">
                                        <span>Choose</span>
                                        <span>From your photos</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- User photos and albums -->
<!--html/partials/pages/profile/timeline/modals/user-photos-modal.html-->
<div id="user-photos-modal" class="modal user-photos-modal is-medium has-light-bg">
    <div class="modal-background"></div>
    <div class="modal-content">
        <!-- Card -->
        <div class="card">
            <div class="card-heading">
                <h3>Choose a picture</h3>
                <!-- Close X button -->
                <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                </div>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <!-- Tabs -->
                <div class="nav-tabs-wrapper">
                    <div class="tabs">
                        <ul class="is-faded">
                            <li class="is-active" data-tab="recent-photos"><a>Recent</a></li>
                            <li data-tab="all-photos"><a>Photos</a></li>
                            <li data-tab="photo-albums"><a>Albums</a></li>
                        </ul>
                    </div>

                    <!-- Recent Photos -->
                    <div id="recent-photos" class="tab-content has-slimscroll-md is-active">
                        <!-- Grid -->
                        <div class="image-grid">
                            <div class="columns is-multiline">
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/3.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/4.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/9.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/2.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/13.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/11.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/17.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/22.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/8.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/18.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/20.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/21.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- All photos -->
                    <div id="all-photos" class="tab-content has-slimscroll-md">
                        <!-- Grid -->
                        <div class="image-grid">
                            <div class="columns is-multiline">
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/19.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/25.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/23.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/28.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/34.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/27.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/18.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/30.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/26.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/29.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/20.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/17.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/11.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/24.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/32.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/31.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/33.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/35.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Load more images -->
                        <div class=" load-more-wrap has-text-centered">
                            <a href="#" class="load-more-button">Load More</a>
                        </div>
                        <!-- /Load more images -->
                    </div>

                    <!-- Albums -->
                    <div id="photo-albums" class="tab-content has-slimscroll-md">
                        <!-- Grid -->
                        <div class="albums-grid">
                            <div class="columns is-multiline">
                                <!-- Album item -->
                                <div class="column is-6">
                                    <div class="album-wrapper" data-album="album-photos-1">
                                        <div class="album-image">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/35.jpg" alt="">
                                        </div>
                                        <div class="album-meta">
                                            <div class="album-title">
                                                <span>Design and Colors</span>
                                                <span>Added on sep 06 2018</span>
                                            </div>
                                            <div class="image-count">
                                                <i data-feather="image"></i>
                                                <span>8</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Album item -->
                                <div class="column is-6">
                                    <div class="album-wrapper" data-album="album-photos-2">
                                        <div class="album-image">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/19.jpg" alt="">
                                        </div>
                                        <div class="album-meta">
                                            <div class="album-title">
                                                <span>Friends and Family</span>
                                                <span>Added on jun 10 2016</span>
                                            </div>
                                            <div class="image-count">
                                                <i data-feather="image"></i>
                                                <span>29</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Album item -->
                                <div class="column is-6">
                                    <div class="album-wrapper" data-album="album-photos-3">
                                        <div class="album-image">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/4.jpg" alt="">
                                        </div>
                                        <div class="album-meta">
                                            <div class="album-title">
                                                <span>Trips and Travel</span>
                                                <span>Added on feb 14 2017</span>
                                            </div>
                                            <div class="image-count">
                                                <i data-feather="image"></i>
                                                <span>12</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Album item -->
                                <div class="column is-6">
                                    <div class="album-wrapper" data-album="album-photos-4">
                                        <div class="album-image">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/3.jpg" alt="">
                                        </div>
                                        <div class="album-meta">
                                            <div class="album-title">
                                                <span>Summer 2017</span>
                                                <span>Added on aug 23 2017</span>
                                            </div>
                                            <div class="image-count">
                                                <i data-feather="image"></i>
                                                <span>32</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Album item -->
                                <div class="column is-6">
                                    <div class="album-wrapper" data-album="album-photos-5">
                                        <div class="album-image">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/20.jpg" alt="">
                                        </div>
                                        <div class="album-meta">
                                            <div class="album-title">
                                                <span>Winter 2017</span>
                                                <span>Added on jan 07 2017</span>
                                            </div>
                                            <div class="image-count">
                                                <i data-feather="image"></i>
                                                <span>7</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Album item -->
                                <div class="column is-6">
                                    <div class="album-wrapper" data-album="album-photos-6">
                                        <div class="album-image">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/2.jpg" alt="">
                                        </div>
                                        <div class="album-meta">
                                            <div class="album-title">
                                                <span>Thanksgiving 2017</span>
                                                <span>Added on nov 30 2017</span>
                                            </div>
                                            <div class="image-count">
                                                <i data-feather="image"></i>
                                                <span>6</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Hidden Grid | Design and colors -->
                        <div id="album-photos-1" class="album-image-grid is-hidden">
                            <div class="album-info">
                                <h4>Design and Colors | <small>8 photo(s)</small></h4>
                                <a class="close-nested-photos">Go Back</a>
                            </div>
                            <div class="columns is-multiline">
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/35.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/17.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/30.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/28.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/32.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/27.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/18.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/26.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Load more images -->
                            <div class=" load-more-wrap has-text-centered">
                                <a href="#" class="load-more-button">Load More</a>
                            </div>
                            <!-- /Load more images -->
                        </div>

                        <!-- Hidden Grid | Friends and Family -->
                        <div id="album-photos-2" class="album-image-grid is-hidden">
                            <div class="album-info">
                                <h4>Friends and Family | <small>29 photo(s)</small></h4>
                                <a class="close-nested-photos">Go Back</a>
                            </div>
                            <div class="columns is-multiline">
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/23.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/22.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/19.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/20.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/2.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/21.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/38.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/36.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/37.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Load more images -->
                            <div class=" load-more-wrap has-text-centered">
                                <a href="#" class="load-more-button">Load More</a>
                            </div>
                            <!-- /Load more images -->
                        </div>

                        <!-- Hidden Grid | Trips and Travel -->
                        <div id="album-photos-3" class="album-image-grid is-hidden">
                            <div class="album-info">
                                <h4>Trips and Travel | <small>12 photo(s)</small></h4>
                                <a class="close-nested-photos">Go Back</a>
                            </div>
                            <div class="columns is-multiline">
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/4.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/6.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/5.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/38.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/37.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/18.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/19.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/3.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/32.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Hidden Grid | Summer 2017 -->
                        <div id="album-photos-4" class="album-image-grid is-hidden">
                            <div class="album-info">
                                <h4>Summer 2017 | <small>32 photo(s)</small></h4>
                                <a class="close-nested-photos">Go Back</a>
                            </div>
                            <div class="columns is-multiline">
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/4.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/6.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/5.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/38.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/37.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/18.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/19.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/3.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/32.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Load more images -->
                            <div class=" load-more-wrap has-text-centered">
                                <a href="#" class="load-more-button">Load More</a>
                            </div>
                            <!-- /Load more images -->
                        </div>

                        <!-- Hidden Grid | Winter 2017 -->
                        <div id="album-photos-5" class="album-image-grid is-hidden">
                            <div class="album-info">
                                <h4>Winter 2017 | <small>7 photo(s)</small></h4>
                                <a class="close-nested-photos">Go Back</a>
                            </div>
                            <div class="columns is-multiline">
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/22.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/24.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/36.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/25.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/2.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/8.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/12.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Hidden Grid | Thanksgiving 2017 -->
                        <div id="album-photos-6" class="album-image-grid is-hidden">
                            <div class="album-info">
                                <h4>Thanksgiving 2017 | <small>6 photo(s)</small></h4>
                                <a class="close-nested-photos">Go Back</a>
                            </div>
                            <div class="columns is-multiline">
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/23.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/22.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/19.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/20.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/2.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid item -->
                                <div class="column is-4">
                                    <div class="grid-image">
                                        <input type="radio" name="selected_photos">
                                        <div class="inner">
                                            <img src="https://via.placeholder.com/1600x900"
                                                 data-demo-src="assets/img/demo/unsplash/21.jpg" alt="">
                                            <div class="inner-overlay"></div>
                                            <div class="indicator gelatine">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="button is-solid accent-button replace-button is-disabled">Use Picture</button>
            </div>
        </div>

    </div>
</div>
<!-- Profile picture crop modal -->
<!--html/partials/pages/profile/timeline/modals/upload-crop-profile-modal.html-->
<div id="upload-crop-profile-modal" class="modal upload-crop-profile-modal is-xsmall has-light-bg">
    <div class="modal-background"></div>
    <div class="modal-content">

        <div class="card">
            <div class="card-heading">
                <h3>Upload Picture</h3>
                <!-- Close X button -->
                <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                </div>
            </div>
            <div class="card-body">
                <label class="profile-uploader-box" for="upload-profile-picture">
                            <span class="inner-content">
                                    <img src="assets/img/illustrations/profile/add-profile.svg" alt="">
                                    <span>Click here to <br>upload a profile picture</span>
                            </span>
                    <input type="file" id="upload-profile-picture" accept="image/*">
                </label>
                <div class="upload-demo-wrap is-hidden">
                    <div id="upload-profile"></div>
                    <div class="upload-help">
                        <a id="profile-upload-reset" class="profile-reset is-hidden">Reset Picture</a>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button id="submit-profile-picture"
                        class="button is-solid accent-button is-fullwidth raised is-disabled">Use Picture
                </button>
            </div>
        </div>

    </div>
</div>
<!-- Cover image crop modal -->
<!--html/partials/pages/profile/timeline/modals/upload-crop-cover-modal.html-->
<div id="upload-crop-cover-modal" class="modal upload-crop-cover-modal is-large has-light-bg">
    <div class="modal-background"></div>
    <div class="modal-content">

        <div class="card">
            <div class="card-heading">
                <h3>Upload Cover</h3>
                <!-- Close X button -->
                <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                </div>
            </div>
            <div class="card-body">
                <label class="cover-uploader-box" for="upload-cover-picture">
                            <span class="inner-content">
                                    <img src="assets/img/illustrations/profile/add-cover.svg" alt="">
                                    <span>Click here to <br>upload a cover image</span>
                            </span>
                    <input type="file" id="upload-cover-picture" accept="image/*">
                </label>
                <div class="upload-demo-wrap is-hidden">
                    <div id="upload-cover"></div>
                    <div class="upload-help">
                        <a id="cover-upload-reset" class="cover-reset is-hidden">Reset Picture</a>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button id="submit-cover-picture"
                        class="button is-solid accent-button is-fullwidth raised is-disabled">Use
                    Picture
                </button>
            </div>
        </div>

    </div>
</div>
<!-- Share modal -->
<!-- /partials/pages/feed/modals/share-modal.html -->
<div id="share-modal" class="modal share-modal is-xsmall has-light-bg">
    <div class="modal-background"></div>
    <div class="modal-content">

        <div class="card">
            <div class="card-heading">
                <div class="dropdown is-primary share-dropdown">
                    <div>
                        <div class="button">
                            <i class="mdi mdi-format-float-left"></i> <span>Share in your feed</span> <i
                                data-feather="chevron-down"></i>
                        </div>
                    </div>
                    <div class="dropdown-menu" role="menu">
                        <div class="dropdown-content">
                            <div class="dropdown-item" data-target-channel="feed">
                                <div class="media">
                                    <i class="mdi mdi-format-float-left"></i>
                                    <div class="media-content">
                                        <h3>Share in your feed</h3>
                                        <small>Share this publication on your feed.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-item" data-target-channel="friend">
                                <div class="media">
                                    <i class="mdi mdi-account-heart"></i>
                                    <div class="media-content">
                                        <h3>Share in a friend's feed</h3>
                                        <small>Share this publication on a friend's feed.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-item" data-target-channel="group">
                                <div class="media">
                                    <i class="mdi mdi-account-group"></i>
                                    <div class="media-content">
                                        <h3>Share in a group</h3>
                                        <small>Share this publication in a group.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-item" data-target-channel="page">
                                <div class="media">
                                    <i class="mdi mdi-file-document-box"></i>
                                    <div class="media-content">
                                        <h3>Share in a page</h3>
                                        <small>Share this publication in a page.</small>
                                    </div>
                                </div>
                            </div>
                            <hr class="dropdown-divider">
                            <div class="dropdown-item" data-target-channel="private-message">
                                <div class="media">
                                    <i class="mdi mdi-email-plus"></i>
                                    <div class="media-content">
                                        <h3>Share in message</h3>
                                        <small>Share this publication in a private message.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Close X button -->
                <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                </div>
            </div>
            <div class="share-inputs">
                <div class="field is-autocomplete">
                    <div id="share-to-friend" class="control share-channel-control is-hidden">
                        <input id="share-with-friend" type="text"
                               class="input is-sm no-radius share-input simple-users-autocpl"
                               placeholder="Your friend's name">
                        <div class="input-heading">
                            Friend :
                        </div>
                    </div>
                </div>

                <div class="field is-autocomplete">
                    <div id="share-to-group" class="control share-channel-control is-hidden">
                        <input id="share-with-group" type="text"
                               class="input is-sm no-radius share-input simple-groups-autocpl"
                               placeholder="Your group's name">
                        <div class="input-heading">
                            Group :
                        </div>
                    </div>
                </div>

                <div id="share-to-page" class="control share-channel-control no-border is-hidden">
                    <div class="page-controls">
                        <div class="page-selection">

                            <div class="dropdown is-accent page-dropdown">
                                <div>
                                    <div class="button page-selector">
                                        <img src="https://via.placeholder.com/150x150"
                                             data-demo-src="assets/img/avatars/hanzo.svg" alt="">
                                        <span>Css Ninja</span> <i
                                            data-feather="chevron-down"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <div class="dropdown-item">
                                            <div class="media">
                                                <img src="https://via.placeholder.com/150x150"
                                                     data-demo-src="assets/img/avatars/hanzo.svg" alt="">
                                                <div class="media-content">
                                                    <h3>Css Ninja</h3>
                                                    <small>Share on Css Ninja.</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dropdown-item">
                                            <div class="media">
                                                <img src="https://via.placeholder.com/150x150"
                                                     data-demo-src="assets/img/icons/logos/nuclearjs.svg" alt="">
                                                <div class="media-content">
                                                    <h3>NuclearJs</h3>
                                                    <small>Share on NuclearJs.</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dropdown-item">
                                            <div class="media">
                                                <img src="https://via.placeholder.com/150x150"
                                                     data-demo-src="assets/img/icons/logos/slicer.svg" alt="">
                                                <div class="media-content">
                                                    <h3>Slicer</h3>
                                                    <small>Share on Slicer.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="alias">
                            <img src="https://via.placeholder.com/150x150"
                                 data-demo-src="assets/img/avatars/jenna.png" alt="">
                        </div>
                    </div>
                </div>

                <div class="field is-autocomplete">
                    <div id="share-to-private-message" class="control share-channel-control is-hidden">
                        <input id="share-with-private-message" type="text"
                               class="input is-sm no-radius share-input simple-users-autocpl"
                               placeholder="Message a friend">
                        <div class="input-heading">
                            To :
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="control">
                        <textarea class="textarea comment-textarea" rows="1"
                                  placeholder="Say something about this ..."></textarea>
                    <button class="emoji-button">
                        <i data-feather="smile"></i>
                    </button>
                </div>
                <div class="shared-publication">
                    <div class="featured-image">
                        <img id="share-modal-image" src="https://via.placeholder.com/1600x900"
                             data-demo-src="assets/img/demo/unsplash/1.jpg" alt="">
                    </div>
                    <div class="publication-meta">
                        <div class="inner-flex">
                            <img id="share-modal-avatar" src="https://via.placeholder.com/300x300"
                                 data-demo-src="assets/img/avatars/dan.jpg" data-user-popover="1" alt="">
                            <p id="share-modal-text">Yesterday with <a href="#">@Karen Miller</a> and <a href="#">@Marvin
                                    Stemperd</a> at the
                                <a href="#">#Rock'n'Rolla</a> concert in LA. Was totally fantastic! People were
                                really
                                excited about this one!
                            </p>
                        </div>
                        <div class="publication-footer">
                            <div class="stats">
                                <div class="stat-block">
                                    <i class="mdi mdi-earth"></i>
                                    <small>Public</small>
                                </div>
                                <div class="stat-block">
                                    <i class="mdi mdi-eye"></i>
                                    <small>163 views</small>
                                </div>
                            </div>
                            <div class="publication-origin">
                                <small>Friendkit.io</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="bottom-share-inputs">

                <div id="action-place" class="field is-autocomplete is-dropup is-hidden">
                    <div id="share-place" class="control share-bottom-channel-control">
                        <input type="text" class="input is-sm no-radius share-input simple-locations-autocpl"
                               placeholder="Where are you?">
                        <div class="input-heading">
                            Location :
                        </div>
                    </div>
                </div>

                <div id="action-tag" class="field is-autocomplete is-dropup is-hidden">
                    <div id="share-tags" class="control share-bottom-channel-control">
                        <input id="share-friend-tags-autocpl" type="text" class="input is-sm no-radius share-input"
                               placeholder="Who are you with">
                        <div class="input-heading">
                            Friends :
                        </div>
                    </div>
                    <div id="share-modal-tag-list" class="tag-list no-margin"></div>
                </div>

            </div>
            <div class="card-footer">
                <div class="action-wrap">
                    <div class="footer-action" data-target-action="tag">
                        <i class="mdi mdi-account-plus"></i>
                    </div>
                    <div class="footer-action" data-target-action="place">
                        <i class="mdi mdi-map-marker"></i>
                    </div>
                    <div class="footer-action dropdown is-spaced is-neutral dropdown-trigger is-up"
                         data-target-action="permissions">
                        <div>
                            <i class="mdi mdi-lock-clock"></i>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <a href="#" class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="globe"></i>
                                        <div class="media-content">
                                            <h3>Public</h3>
                                            <small>Anyone can see this publication.</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="users"></i>
                                        <div class="media-content">
                                            <h3>Friends</h3>
                                            <small>only friends can see this publication.</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="user"></i>
                                        <div class="media-content">
                                            <h3>Specific friends</h3>
                                            <small>Don't show it to some friends.</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="lock"></i>
                                        <div class="media-content">
                                            <h3>Only me</h3>
                                            <small>Only me can see this publication.</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="button-wrap">
                    <button type="button" class="button is-solid dark-grey-button close-modal">Cancel</button>
                    <button type="button" class="button is-solid primary-button close-modal">Publish</button>
                </div>
            </div>
        </div>

    </div>
</div>