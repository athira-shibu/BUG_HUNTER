<template>
    <!-- Hero section -->
    <div id="intro" class="hero">
        <h1>Welcome to Bug Tracker</h1>
        <p>Your ultimate solution for managing bugs efficiently.</p>
        <button type="button" class="buttons" onclick="navigateToBugCreation()">Report Bug</button>
    </div>
    <div>
        <statistics-component />
     </div>
     <div>
        <sidebar-component />
     </div>
     <div>
        <recent-bugs-section />
     </div>
     <div>
        <footer-component />
    </div>
  </template>
  
  <script>
  export default {
    name: 'Home',
  };
  </script>
  