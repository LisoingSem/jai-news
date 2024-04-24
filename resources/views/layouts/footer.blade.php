<div class="container justify-content-end d-flex mt-2 d-sm-block d-md-none position-fixed bottom-0">
      <a href="#top"><button type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-angles-up"></i></button></a>
</div>
<?php
      $companyInfo = DB::table('companies')->where('status', 1)->first();
?>
<div class="container-fluid bg-dark">
      <div class="container my-5">
            <footer class="text-center text-lg-start text-white bg-dark ">
                  <div class="container p-4 pb-0">
                        <section>
                              <div class="row">
                                    <div class="col-md-7 mb-2 mb-md-0 brand-side">
                                          <div class="logo">
                                                <img src="{{ asset($companyInfo->logo) }}" alt="">
                                          </div>

                                          <div class="brand-des">
                                                <h1 class="text-uppercase">{{ $companyInfo->name }}</h1>
                                                <span>
                                                      {{ $companyInfo->details }}
                                                </span>
                                                <span>{{ $companyInfo->copyright }}</span>
                                          </div>
                                    </div>

                                    <div class="col-md-5 mb-md-0 address">
                                          <div class="row">
                                                <div class="col-12 mb-4">
                                                      <h5>អាសយដ្ឋាន</h5>
                                                      <span>
                                                            {{ $companyInfo->address }}
                                                      </span>
                                                </div>
                                          </div>
                                          <?php
                                                $contacts = DB::table('contacts')->where('status', 1)->orderBy('order', 'ASC')->get();
                                          ?>
                                          <div class="row">
                                                <div class="col-12">
                                                      <h5>ទំនាក់ទំនង</h5>
                                                      @foreach($contacts as $contact)
                                                      <span>
                                                            {{ $contact->contact }}
                                                      </span>
                                                      @endforeach
                                                      <!-- <span>
                                                            +855 978 263 599
                                                      </span> -->
                                                </div>
                                          </div>
                                    </div>

                              </div>
                        </section>

                        <hr class="mb-4" />

                        
                        <!-- Section: Social media -->
                        <section class="mb-4 text-center">
                              <h3 class="mb-1">បណ្តាញសង្គម</h3>
                              <?php
                                    $socials = DB::table('socials')->where('status', 1)->orderBy('order', 'ASC')->get();
                              ?>
                              @foreach($socials as $social)
                                    <a class="btn btn-outline-light btn-floating m-1" href="{{ $social->link }}" target="_blank" role="button"><i class="{{ $social->icon }}"></i></a>
                              @endforeach
                              <!-- <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-tiktok"></i></a>

                              <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a> -->

                        </section>
                  </div>

                  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                        © 2023 Copyright:
                        <a class="text-white" href="https://mdbootstrap.com/">JaiNews.com</a>
                  </div>
                  <!-- Copyright -->
            </footer>
            <!-- Footer -->
      </div>
</div>