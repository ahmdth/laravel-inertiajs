<template>
  <nav>
    <ul class="flex space-x-6">
      <li>
        <NavLink href="/" :active="$page.component === 'Home'">Home</NavLink>
      </li>
      <li>
        <NavLink href="/users" :active="$page.component === 'User/Index'">Users</NavLink>
      </li>
      <template v-if="!$page.props.user">
        <li>
          <NavLink href="/login" :active="$page.component === 'Auth/Login'">Login</NavLink>
        </li>
        <li>
          <NavLink href="/register" :active="$page.component === 'Auth/Register'">Register</NavLink>
        </li>
      </template>
      <li v-else>
        <Link href="/logout" method="post" as="button"
              class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition">
          Logout
        </Link>
      </li>
    </ul>
  </nav>
</template>

<script setup>
import NavLink from "./NavLink";
</script>
