<template>
    <!-- <div class="sidebar" id="sidebar"> -->
    <div class="container">
        <div class="col-md-12">
            <div class="tab-content">
                <!-- <div class="tab-pane fade" id="contacts"> -->
                <contacts />
                <!-- </div> -->

                <!-- <div id="messages" class="tab-pane fade active show"> -->
                <discussions />
                <!-- </div> -->

                <notifications />

                <settings />

                <AddFriends />

                <CreateChat />
            </div>
            <conversation
                :user="selectedUser"
                :messages="messages"
                @new="saveNewMsg"
            />
        </div>
    </div>
    <!-- </div> -->
</template>

<script>
import contacts from "./../inside_sidebar/Contacts.vue";
import discussions from "./../inside_sidebar/Discussions.vue";
import notifications from "./../inside_sidebar/Notifications.vue";
import settings from "./../inside_sidebar/Settings.vue";
import AddFriends from "./../inside_sidebar/AddFriends.vue";
import CreateChat from "./../inside_sidebar/CreateChat.vue";

export default {
    components: {
        contacts,
        discussions,
        notifications,
        settings,
        AddFriends,
        CreateChat,
    },
};
</script>
