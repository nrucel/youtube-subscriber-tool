<div class="wrap">    <section class="app-content">               <div class="row">            <div class="col-sm-12">                <div class="widget">                    <header class="widget-header">                        <h4 class="widget-title">Üyeler</h4>                    </header>                    <hr class="widget-separator">                    <div class="widget-body row">						<?php if($this->session->flashdata("hata")): ?>							<div class="col-sm-1"></div>							<div class="col-sm-10">								<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>									<h4 class="alert-title">Hata!</h4>									<p><?=$this->session->flashdata("hata")?></p>								</div>							</div>							<div class="col-sm-1"></div>						<?php endif; ?>						<?php if($this->session->flashdata("basarili")): ?>							<div class="col-sm-1"></div>							<div class="col-sm-10">								<div class="alert alert-success alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>									<h4 class="alert-title">Başarılı...</h4>									<p><?=$this->session->flashdata("basarili")?></p>								</div>							</div>							<div class="col-sm-1"></div>						<?php endif; ?>						<div class="col-sm-12">							<div class="table-responsive">								<table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">									<thead>										<tr>											<th>Ad Soyad</th>											<th>Email</th>											<th>Şifre</th>											<th>Kayıt Tarihi</th>											<th>Düzenle</th>											<th>Sil</th>										</tr>									</thead>									<tbody>										<?php foreach($uyeler as $u): ?>												<tr>																								<td><?=$u->adSoyad?></td>												<td><?=$u->email?></td>												<td><?=$u->sifre?></td>												<td><?=$u->kayitTarihi?></td>												<td><a href="<?=base_url("vip/uye-duzenle/".$u->id)?>">Düzenle</a></td>												<td><a href="<?=base_url("vip/uye-sil/".$u->id)?>">Sil</a></td>											</tr>										<?php endforeach; ?>																			</tbody>								</table>							</div>						</div>					</div>                                    </div>            </div>        </div>    </section></div>