<template>
      <li class="nav-item dropdown nav-notifications">
        <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i data-feather="bell"></i>
          <div v-if="notifications.length > 0" class="indicator">
            <div class="circle"></div>
          </div>
        </a>
        <div class="dropdown-menu" aria-labelledby="notificationDropdown">
          <div class="dropdown-header d-flex align-items-center justify-content-between">
            <p class="mb-0 font-weight-medium">Notifikasi</p>
            <a href="#" v-on:click="MarkAllAsRead()" class="text-muted">Hapus semua</a>
          </div>
          <div v-for="notification in notifications" class="dropdown-body" >
            <a href="#" v-on:click="MarkAsRead(notification)" class="dropdown-item">
                <div class="icon">
                    <i v-if="notification.data.jenis == 'Pelaporan'" data-feather="book"></i>
                    <i v-else data-feather="alert-triangle"></i>
                </div>
                <div class="content">
                    <p v-if="notification.data.jenis == 'Pelaporan'">{{ notification.data.jenis }} Baru : {{ notification.data.pelaporan.nama_perusahaan }} periode {{ notification.data.pelaporan.periode }} tahun {{ notification.data.pelaporan.tahun }}</p>
                    <p v-else>{{ notification.data.jenis }} Baru : {{ notification.data.pengaduan.jenis }}</p>
                </div>
            </a>
          </div>
          <div class="dropdown-footer d-flex align-items-center justify-content-center">
            <a v-if="notifications.length == 0">Tidak Ada notifikasi</a>
            <a v-else href="#" v-on:click="ViewAll()">View all</a>
          </div>
        </div>
      </li>
</template>

<script>
    export default {
        props: ['notifications'],
        methods: {
            MarkAsRead: function(notification){
                var data = {
                    id: notification.id
                };
                axios.post('notification-pelaporan/read', data).then( response => {
                  if (notification.data.jenis == 'Pelaporan') {
                    window.location.href = "/pelaporan/" + notification.data.pelaporan.id;
                  } else {
                    window.location.href = "/pengaduan/" + notification.data.pengaduan.id;
                  }
                    
                });
            },
            MarkAllAsRead: function(){
                axios.post('notification-pelaporan/readall').then( response => {
                   window.location.reload();
                });
            },
            ViewAll: function(){
                axios.post('notification-pelaporan/readall').then( response => {
                     window.location.href = "/pengaduan";
                });
            }
        }
    }
</script>
