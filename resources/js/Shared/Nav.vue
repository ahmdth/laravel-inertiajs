<template>
  <nav>
    <ul class="flex space-x-6">
      <li>
        <NavLink href="/" :active="$page.component === 'Home'">Home</NavLink>
      </li>
      <li>
        <Link
          href="/users"
          class="text-blue-500 hover:underline"
          :class="{'font-bold underline': $page.url.startsWith('/users') }"
        >Users
        </Link>
      </li>
      <li>
        <Link
          href="/settings"
          class="text-blue-500 hover:underline"
          :class="{'font-bold underline': $page.component === 'Settings' }"
        >Settings
        </Link>
      </li>
      <li>
        <Link href="/logout" method="post" as="button" class="text-blue-500 hover:underline">
          Logout
        </Link>
      </li>
    </ul>
  </nav>
</template>

<script setup>
import NavLink from "./NavLink";
</script>
