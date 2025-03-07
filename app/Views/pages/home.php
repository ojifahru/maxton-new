<?= $this->extend('pages/template/main') ?>

<?= $this->section('content') ?>
<!-- Content -->

<!-- Slider -->
<section class="Slider" data-aos="zoom-in">
    <div id="sliderCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <?php foreach ($sliders as $key => $slider) : ?>
                <button type="button" data-bs-target="#sliderCarousel" data-bs-slide-to="<?= $key ?>"
                    class="<?= $key == 0 ? 'active' : '' ?>"
                    aria-current="<?= $key == 0 ? 'true' : '' ?>"
                    aria-label="Slide <?= $key + 1 ?>"></button>
            <?php endforeach; ?>
        </div>

        <div class="carousel-inner">
            <?php foreach ($sliders as $key => $slider) : ?>
                <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                    <img src="<?= base_url('uploads/sliders/' . $slider['image'])  ?>"
                        alt="<?= esc($slider['title']) ?>"
                        class="d-block w-100"
                        style="max-height: 600px; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                        <h5 class="text-white"><?= esc($slider['title']) ?></h5>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#sliderCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#sliderCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<!-- End Slider -->


<!-- Keynote Speaker -->
<section class="keynote-speaker py-5" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2 class="section-title text-primary fw-bold">Keynote Speaker</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php if (!empty($keynoteSpeakers)) : ?>
                <?php $keynoteSpeakers; ?>
                <div class="col-lg-10">
                    <div class="card keynote-card d-flex flex-row align-items-start shadow-lg border-0">
                        <div class="col-4 text-center p-2">
                            <img src="<?= base_url('uploads/keynote_speakers/' . $keynoteSpeakers['image']) ?>" class="card-img keynote-img"
                                alt="<?= $keynoteSpeakers['name'] ?>"
                                style="max-width: 200px;">
                        </div>
                        <div class="col-8 py-4 text-center text-md-start">
                            <h2 class="card-title fw-semibold"><?= $keynoteSpeakers['name'] ?></h2>
                            <p class="card-text"><?= $keynoteSpeakers['description'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End Keynote Speaker -->

<!-- Plenary Speaker -->
<section class="plenary-speaker py-2" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2 class="section-title text-primary fw-bold">Plenary Speaker</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php if (!empty($plenarySpeakers)) : ?>
                <?php foreach ($plenarySpeakers as $plenarySpeaker) : ?>
                    <div class="col-12 col-sm-6 col-md-4 mb-4 plenary-speaker-item" data-aos="fade-up">
                        <div class="card plenary-card d-flex flex-row align-items-center h-100 shadow-lg border-0">
                            <div class="col-5 text-center p-4">
                                <img src="<?= base_url('uploads/plenary_speakers/' . $plenarySpeaker['image']) ?>" class="card-img keynote-img"
                                    alt="<?= $plenarySpeaker['name'] ?>">
                            </div>
                            <div class="col-7 p-4 text-center text-md-start">
                                <h5 class="card-title fw-semibold"><?= $plenarySpeaker['name'] ?></h5>
                                <p class="card-text"><?= $plenarySpeaker['description'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End Plenary Speaker -->

<!-- Invited Speaker -->
<section class="invited-speaker py-3" data-aos="fade-up">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title text-primary fw-bold">Invited Speakers</h2>
        </div>
        <div class="owl-carousel owl-theme">
            <?php if (!empty($invitedSpeakers)) : ?>
                <?php foreach ($invitedSpeakers as $invitedSpeaker) : ?>
                    <div class="item invited-speaker-item mb-4" data-aos="fade-up">
                        <div class="card invited-card d-flex flex-row align-items-start h-100 shadow-lg border-0">
                            <div class="col-5 text-center p-4">
                                <img src="<?= base_url('uploads/invited_speakers/' . $invitedSpeaker['image']) ?>" class="card-img keynote-img"
                                    alt="<?= $invitedSpeaker['name'] ?>">
                            </div>
                            <div class="col-7 p-4 text-center text-md-start">
                                <h5 class="card-title fw-semibold"><?= $invitedSpeaker['name'] ?></h5>
                                <p class="card-text"><?= $invitedSpeaker['description'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>


<!-- End Invited Speaker -->

<!-- Conference Timeline -->
<section class="conference-timeline py-5" data-aos="fade-up">
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center mb-4">
                <h2 class="section-title text-primary fw-bold">Conference Timeline</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php if (!empty($timelines)) : ?>
                    <?php
                    usort($timelines, function ($a, $b) {
                        return strtotime($a['date']) - strtotime($b['date']);
                    });
                    ?>
                    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                        <?php foreach ($timelines as $index => $event) : ?>
                            <div class="timeline-step" data-aos="fade-up" data-aos-delay="<?= 100 * $index ?>">
                                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top">
                                    <div class="inner-circle"></div>
                                    <p class="h6 mt-3 mb-1"><?= date('l, d F Y', strtotime($event['date'])) ?></p>
                                    <p class="h6 text-muted mb-0"><?= esc($event['title']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- End Conference Timeline -->

<!-- Conference Topics -->
<section class="conference-topics py-5" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col text-center mb-4">
                <h2 class="section-title text-primary fw-bold">Conference Topics</h2>
            </div>
        </div>
        <div class="row">
            <?php if (!empty($topics)) : ?>
                <?php foreach ($topics as $topic) : ?>
                    <div class="col-md-4 mb-4" data-aos="flip-up">
                        <div class="topic-card shadow-sm rounded p-4 text-center">
                            <h3 class="h5"><?= $topic['title'] ?></h3>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End Conference Topics -->

<?= $this->endSection() ?>