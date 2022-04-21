<template>
    <!-- contacts begin here -->
    <div class="tab-pane fade" id="contacts">
        <!-- <div> -->
        <div class="search">
            <form class="form-inline position-relative">
                <input
                    type="search"
                    class="form-control"
                    id="people"
                    placeholder="Search for people..."
                />
                <button type="button" class="btn btn-link loop">
                    <i class="material-icons">search</i>
                </button>
            </form>
            <button
                class="btn create"
                data-toggle="modal"
                data-target="#exampleModalCenter"
            >
                <i class="material-icons">person_add</i>
            </button>
        </div>

        <div class="list-group sort">
            <button
                class="btn filterMembersBtn active show"
                data-toggle="list"
                data-filter="all"
            >
                All
            </button>
            <button
                class="btn filterMembersBtn"
                data-toggle="list"
                data-filter="online"
            >
                Online
            </button>
            <button
                class="btn filterMembersBtn"
                data-toggle="list"
                data-filter="offline"
            >
                Offline
            </button>
        </div>

        <div class="contacts">
            <h1>Contacts</h1>
            <div class="list-group" id="contacts" role="tablist">
                <a
                    href="#"
                    class="filterMembers all online contact"
                    data-toggle="list"
                >
                    <img
                        class="avatar-md"
                        src="dist/img/avatars/avatar-female-1.jpg"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Janette"
                        alt="avatar"
                    />
                    <div class="status">
                        <i class="material-icons online">fiber_manual_record</i>
                    </div>
                    <div class="data">
                        <h5 v-for="user in contacts" :key="user">
                            <!-- v-for="user in contacts" :key="user" -->
                            <!-- Janette Dalton -->
                            {{ user.name }}
                        </h5>
                        <p>Sofia, Bulgaria</p>
                    </div>
                    <div class="person-add">
                        <i class="material-icons">person</i>
                    </div>
                </a>

                <a
                    href="#"
                    class="filterMembers all online contact"
                    data-toggle="list"
                >
                    <img
                        class="avatar-md"
                        src="dist/img/avatars/avatar-male-1.jpg"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Michael"
                        alt="avatar"
                    />
                    <div class="status">
                        <i class="material-icons online">fiber_manual_record</i>
                    </div>
                    <div class="data">
                        <h5>Michael Knudsen</h5>
                        <p>Washington, USA</p>
                    </div>
                    <div class="person-add">
                        <i class="material-icons">person</i>
                    </div>
                </a>
                <!-- offline -->
                <a
                    href="#"
                    class="filterMembers all offline contact"
                    data-toggle="list"
                >
                    <img
                        class="avatar-md"
                        src="dist/img/avatars/avatar-female-5.jpg"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Keith"
                        alt="avatar"
                    />
                    <div class="status">
                        <i class="material-icons offline"
                            >fiber_manual_record</i
                        >
                    </div>
                    <div class="data">
                        <h5>Keith Morris</h5>
                        <p>Chisinau, Moldova</p>
                    </div>
                    <div class="person-add">
                        <i class="material-icons">person</i>
                    </div>
                </a>
                <a
                    href="#"
                    class="filterMembers all offline contact"
                    data-toggle="list"
                >
                    <img
                        class="avatar-md"
                        src="dist/img/avatars/avatar-female-6.jpg"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Louis"
                        alt="avatar"
                    />
                    <div class="status">
                        <i class="material-icons offline"
                            >fiber_manual_record</i
                        >
                    </div>
                    <div class="data">
                        <h5>Louis Martinez</h5>
                        <p>Vienna, Austria</p>
                    </div>
                    <div class="person-add">
                        <i class="material-icons">person</i>
                    </div>
                </a>
            </div>
        </div>
        <!-- </div> -->
        <!-- contacts end here  -->
        <!-- discussions start here -->
        <!-- <div class="search">
      <form class="form-inline position-relative">
        <input type="search" class="form-control" id="conversations" placeholder="Search for conversations...">
        <button type="button" class="btn btn-link loop"><i class="material-icons">search</i></button>
      </form>
      <button class="btn create" data-toggle="modal" data-target="#startnewchat"><i class="material-icons">create</i></button>
    </div>
    <div class="list-group sort">
      <button class="btn filterDiscussionsBtn active show" data-toggle="list" data-filter="all">All</button>
      <button class="btn filterDiscussionsBtn" data-toggle="list" data-filter="read">Read</button>
      <button class="btn filterDiscussionsBtn" data-toggle="list" data-filter="unread">Unread</button>
    </div> -->
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            contacts: {},
        };
    },

    beforeMount() {
        axios
            .get("http://127.0.0.1:8000/contacts")
            .then((response) => {
                this.contacts = response.data;
            })
            .catch((error) => {
                console.log(error);
            });
    },
};
</script>
