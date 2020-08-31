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
          </div>
          <div v-for="notification in notifications" class="dropdown-body" >
            <a href="#" v-on:click="MarkAsRead(notification)" class="dropdown-item">
                <div class="icon">
                    <i data-feather="book"></i>
                </div>
                <div class="content">
                    <p>Pelaporan {{ notification.data.pelaporan.jenis }} periode {{ notification.data.pelaporan.periode }} tahun {{ notification.data.pelaporan.tahun }} telah ditanggapi.</p>
                </div>
            </a>
          </div>
          <div class="dropdown-footer d-flex align-items-center justify-content-center">
            <a v-if="notifications.length == 0">Tidak Ada notifikasi</a>
            <a v-else href="/pelaporan">View all</a>
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
                    window.location.href = "/pelaporan/" + notification.data.pelaporan.id;
                });
            }
        }
    }
</script>
