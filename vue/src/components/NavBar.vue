<script>
export default {
  name: "NavBar",
  data() {
    return {
      showMenu: false,
    };
  },
  methods: {
    toggleMenu() {
      this.showMenu = !this.showMenu;
    },
  },
};
</script>


<template>
    <nav class="w-full fixed top-0 left-0 z-50 bg-black text-white px-6 py-4 flex items-center justify-between border-b border-gray-700">
        <!-- Left: Logo and Tabs -->
        <div class="flex items-center space-x-6">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <!-- <img src="https://media.istockphoto.com/id/2185236359/photo/mid-aged-man-comfortably-working-at-home-sitting-on-the-floor-with-his-beagle-dog-by-his-side.jpg?s=1024x1024&w=is&k=20&c=4CGVlTotOQLureX_m2A8fRiSvEimpomhP2NZBgpuFuA=" alt="BUG HUNTER" class="h-8 w-8" /> -->
                <span class="text-lg font-semibold">Bug Hunter</span>
            </div>
            <!-- Tabs -->
            <ul class="flex items-center space-x-6 text-sm font-medium text-gray-300">
                <li><a href="#" class="hover:text-white">Overview</a></li>
                <li><a href="#" class="hover:text-white">Projects</a></li>
                <li><a href="#" class="hover:text-white">Organization Members</a></li>
                <li><a href="#" class="hover:text-white">Teams</a></li>
            </ul>
        </div>
        <!-- Right: Icons (You can replace these with actual icons later) -->
        <div class="flex items-center space-x-4 text-gray-300">
            <!-- <button class="hover:text-white">🔎</button>
            <button class="hover:text-white">🔎</button>
            <button class="hover:text-white">🔎</button> -->
        </div>
        <div class="relative" @click="toggleMenu">
            <img
                src="https://media.istockphoto.com/id/2185236359/photo/mid-aged-man-comfortably-working-at-home-sitting-on-the-floor-with-his-beagle-dog-by-his-side.jpg?s=1024x1024&w=is&k=20&c=4CGVlTotOQLureX_m2A8fRiSvEimpomhP2NZBgpuFuA="
                alt="User Avatar"
                class="w-8 h-8 rounded-full cursor-pointer"
                />
            <div v-if="showMenu"
                class="absolute right-0 mt-2 w-48 bg-white text-black rounded-md shadow-lg z-50">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Your Profile</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Organization</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Sign out</a>
            </div>
        </div>
    </nav>
</template>

