<!doctype html>
<html class="no-js" lang="">

<head>
    @include('layout.head')

</head>

<body>
    @include('layout.header')
    @include('layout.aside')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
        <form action="{{ route('sendSMS') }}" method="post">
            @csrf
            <input type="text" name="message">
            <button type="submit" class="btn btn-info">send</button>
        </form>
        <section class="section dashboard">
            <form action="{{ route('theme') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Site Theme</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Site Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" type="text" name="name" value="{{ isset($themeData['name']) ? $themeData['name'] : '' }}">
                                    </div>
                                    <small class="form-text text-muted">ex. Rentals</small>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Logo</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input class="form-control" type="text" placeholder="logo link" name="logo" value="{{ isset($themeData['logo']) ? $themeData['logo'] : '' }}">
                                    </div>
                                    <small class="form-text text-muted">ex. https://path/to/logo.png</small>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Contact Phone</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input class="form-control" type="tel" name="phone" value="{{ isset($themeData['phone']) ? $themeData['phone'] : '' }}">
                                    </div>
                                    <small class="form-text text-muted">ex. +254 7787 887 989</small>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Site Email</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                        <input class="form-control" type="email" name="email" value="{{ isset($themeData['email']) ? $themeData['email'] : '' }}">
                                    </div>
                                    <small class="form-text text-muted">ex. rental@example.com</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Location</strong>
                            </div>
                            <div class="card-body">

                                <select data-placeholder="Choose a Country..." name="location" class="standardSelect" tabindex="1">
                                    <option value="" label="default"></option>
                                    <option value="Kajiando" {{ isset($themeData['location']) && $themeData['location'] == 'Kajiando' ? 'selected' : '' }}>Kajiando</option>
                                    <option value="Nyeri" {{ isset($themeData['location']) && $themeData['location'] == 'Nyeri' ? 'selected' : '' }}>Nyeri</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <button type="submit" class="btn btn-seccondary">Update</button>
                    </div>
                </div>
            </form>

        </section>
    </main>

    @include('layout.footer')
    @include('layout.scripts')

</body>

</html>