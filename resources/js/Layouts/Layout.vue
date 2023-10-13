<script setup>
import MainNav from "@/Components/MainNav.vue";
import { useDark, useToggle } from "@vueuse/core";
import { ref, provide } from "vue";
import { Link } from "@inertiajs/vue3";

let width = ref("w-[220px]");
let hide = ref(false);
const selectedColor = ref("");
const isDark = useDark();
const toggleDark = useToggle(isDark);

provide("selectedColor", selectedColor);

function toggleWidth() {
    if (width.value == "w-[220px]") {
        width.value = "w-[100px]";
        hide.value = true;
    } else {
        width.value = ["w-[220px]"];
        hide.value = false;
    }
}
</script>

<template>
    <div class="flex min-h-screen">
        <div
            id="sidebar"
            class="bg-gray-800 p-6 duration-500"
            :class="
                ([width],
                {
                    'bg-red-600': selectedColor == 'red',
                    'bg-blue-600': selectedColor == 'blue',
                    'bg-green-600': selectedColor == 'green',
                })
            "
            style="position: relative"
        >
            <button
                class="text-xl text-white"
                @click="toggleWidth"
                style="position: absolute; right: 10px; top: 10px"
            >
                <i class="fa-solid fa-bars"></i>
            </button>
            <div id="branding" :hidden="hide">
                <img
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAk1BMVEX////uNpXuMZPtK5HuLZLuMpTtJpD//P7/+v3+9fr+8/ntI4/+9/vuN5X94fDuLZT97PX3rs7vQZv6x+D82+z70eb5vNnvQZz95fL5wdz3qM/71un1k8TwTaP+8Pj96PP4uNb3os3wVKL0gbvzeLXyZa70ir32nMrya63xXaj0frrycbH0h7z1l8XzarDxW6n4rtRHMyd2AAAPn0lEQVR4nO1d2WKqOhTVDDigoiAiKio4VGod/v/rLtkBRCuQIA49l/VkKcQskuw5sVarUKFChQoVKlSoUKFChQoVKlSoUKFChQoVKlSoUKFChQoVas35eGgatj0a2bZhDhft0tsOGjcMc9rrd0psWhBj2/3Z+56n6916AF3XPX+znrnmvIS2l18/O98P2uZwPH+3mp2nZb7BLDT6w8neUlVMCKK0HoFShAhWVNVajXqtwm2b7omythG6NB437ayWpU6Uu+gbh01dQfV0UKxY67PZkG97PJp5WlbbiKjW3jWfSXI883WcRS8Eofp6JMlxOvPqJL9tRPTjYfEcem17o4rQ4yNJVM0dC5Oc246KaX6znCRWN3b5A9lf7jMn5x1g52ss1HZ7sBF+dSFJZTfol0vQ9uuS/Fg/iH8WaXtHC7Rd90fl0WsYJ1W+D9AP1cqROY3eSSWCjRGME2ONVM9ulkNwPNOK8YN+1GdZcmHuWmL8ukSl/n69d7TLy0bKdlgGwaUn+I5TQL1pats9n4rJF6o6k16/3W73p9+KEl8m3uRhfotVwQl6AdLc+yZAZ5I1ORAGsDu6RHcTXfpWE8z3vccIGv5jA8hBvu8Zc/OVlsFP1fezwcBd6yrqIt1IPthcKYm2vYckjq0/OoAceP97MY73OP0BlR4WbSaj2uMvVVGN60f7u8SjqC4isO+jc1BEtXAuRcu8adywsgj+JAZ9vPu67ZmpJ+9WVgV1Y/OnjBkaAt1QNLL0q7K9unf+y3lqrK9ej7YvZOI0Z0paDwpRdJIUbSuL4HeuczJRu1dPrAt4ba1VqQSZSLXjxgeZLoSXb+yZ6vUzyk5+om4zBF1BivVIMRqZbauH/N71bhjW8VrWXzuXPIJA0eMmiJktodVboSTCsK4IvJckBmUJ0SsQi42imW3EI02gf6PrdcigufmPXWA65ejBXxSdfm2RJWQYQyrQwcNvhlQ38p+L8SSCwXJZLdYZehAYCoxha3dHkSFLPCRXthi96n/uy1PzLc3R3UbwWtSbGv2aAa9EV821wlopBl93KUZw7j9rjooBf+f1cJAyx5AnpvifOEfF0M0RGb1Uh07JfTnw/LsJBp5IptXW36TLKoE1HAxhjqx7AZRZRv+aPxkdxD/5BG09/fmXQT2kS8WfX+ZMEvlKsVOmy1Qc+CctfjXIJFgn2zyN0XsRhTxg7751aufEbamV55h8wCrkQOp++NtdsHMD75lrOECzdJ+pOBT6dSsZewLRcSuboZ09y18LhL1rfyHQE/nmVo7z9f0RciYGUq3RRTfO9789it/IVhhj7yl+YXF0ibKPI/czoQmG/KyAhvEJyvAGih5G7qeCK0jPmqZfnyJJk0CqwzRAXzR/omXkMtrrz1qGERRnVKtNRN8+WaWbtX3vvX5TGrqk7vaE4w5ZC3H4YXImAVUmBZbuYNhvd5xKAU63vif/BkMlXdSsPlPQyCJD5+/LFzSICJQBlf2dx1SGmzI7QxRV1azT2l2/miJyUhmWqSzobGn0xiyv94wUSDbS3QunRG1BD8slT6e5L2eYHjW35BujCAVLDWMlAEbJOUAUhYLqfb0pmM5Q2v2lXcff7NY/s6/J+TyZrW9KFykEW2YvZ6iUxpCsjeGiDaGf6WhksvJT10vMyXcxTB9D2ZaoP/saAUHTwVTfM7dlvrrkXjjD7QcxlJY0FCsaGIEj9iThSUojTvFyhq+PT6bL0iLaIsEwWAAgPeM0PWf4ckspQx8WSTpxhktOCvkQrfwJ1yKFv17udKJNKsMiVpsGYZRBuNZUMHrn4WQIGb7apsmwS7NyHmnQoIQkyuihI2TwXN4QMGzsXz2G+FeVWIwi3pNmJhmGQ2qHfzCGzd2rx1BJr1Ys4gHfMMQwTcOoJDBsvZwhTffxhwVi+rcMYQ20uZcCDOexx0LRPW2E7l4NLhd9MdRJr7teFDC9NeNqfqM9+7OxuzDshxIaac7Jup0kSLVOvvOrlp2odcc/WWohTwDt07P5/aP8e+MM3UhGce+zmWC44AyVXTDYnVH9qtPK3mi1ApNvdfW9RF8bzGZvnQvV9ZBDeolbs4CBdcsQxjCcmaArx6A6cFgfuUw8Srtuo+2etu1aK+lh4U0cSTL1AqNIl6kEg8kmvxA5w9hDIlANMQwlDWPYY5/JLlobCTtcm9QaMwUpbOleKmSUU6dmbGc8NO/K58KokxXVL5C3AIaNuN9cFy35q4dZythSZ1pb9G++glUTgvRmt7Uje4qsa0NfxZjXDXUs6UFEu6xKjrG8ZQp1sZ14euMkYRjDaSC+VLdmeD6Mdqw8kNcKI0NAZsClDdr0p7DJhDqgWbfS5gLOTgLL25DAsBVb15BG74VpPmBo6nVqNcwuwk4zOU2xHdXukFU0mVlBzDAUL8qA3W1Kr5vbwv4byEeNOMPozeAtk2MbkmAYTEvlDBkRdcm+YsSXFvnuBF8Hn9GGBazAyaKTOMVE1uyqvALLKd5cSK9sjZlI7ci6hoKtiwnHGNo68jswcDBWtWn4XztiVadeL2ROvUUscrjibst6A3iVzVC+spQzDPuhrGDQotfOGQYOxxzmGk8KLWj8OTR9eE4TZqx+vCwTMHEbsjEQJa+GWtr4JozhnIsP7LVZAXX8koDhiOpDru4oMGmBeAR5MIyS6jDT4eUmXjCv7ZfsEDnmbb3oyeoLsmQMmTFElX2vNp9ol4WjsFFYKt+xaTqKpwnIg0hzcB19qZLgBiw34tMqLVNA84tTZUuGOMONqiqW26rNr5xBzlBdGiFpLh5PjCEEOEK1WdeAocsfpYrmOA5VKD7IM6Re/o5EQ7JAGBjWxobRY7rg2u4DhgN1Hlk8F4bIS/Yew3UeCSHehJHvn3X1R55hjjIEzCWtb2DYsQeDJdSRX1mSnKHXjiQ+hlgcm7KB5ZLoPZ+lI8YQs/2E/aU7GPd2R3mGishG9omcwohmqaLy+qXkLAeGk4MZO4+zRsiQG3eTwDpjhyVswKCzNRYmazPJrCiKPh1upBnivQDBWk3OFIQ1BAPP63OniR4BQ3ccixDy0wkZgo6pGbPZwZ3YfOm0giUciN3g0541gfThvCHJML8wkeMsJWsIW0N9GJcVWGWJJCRj2JiMY7OErGKGEL/qGaY5NU3DHi0HkyNmrh27yg01/NOUHcMszzCJxUlmJRImnrkfT0GBJYI9jGHHvowq+WbKit3Lo6wTjZ9e0g0EKCurZC7IRQPSqyieAEJjXQAjCYJ1DRjCS0E+83ITdhaMYWMZL2yyZo4Nuxf8ql/anJt1FxtXkmH+Ro0ILRlbEMZwwb0uDF8xiFWiwh2geNZzY9qLx/C292Cax9s9eOha3KbhGkgMojVyF4Z8qVHYeXQpcFQZw84lmkhgc6gTj+EtQ3gjsSnHGbrCUkGT2dklEa8hkwvDOtcYh+hpYNi7VHQCwwa7N8wFXDOkFnsB8S5mrr2FM8hEanfeQjxHAwzHYX6cb3CNw67AMBEZAUnTZvfy9728dm/5NIvv5+GCgyBDtJHbJ7sU1olgp0QMQ/srEsbAMEEDxrAP952vyISd9JMXqcXsE+Hwn8jO0yscRBc4Zxj9xXWurSUYJqYi6EPwD3lovHddkswXXsQQb9vB3R3B7KPcHGVoibrCnGHcUzDHInEIDCdJhsEY9nBMpnkttNGJXZyGa5radk+45BViIpLI2a17zbAXM6RW+8IKGCZEBVhtXFDDbTelNjx3G8qAYEmv+7FvnQORDe6/Iaj3YdASKR3IkYYeBmOY3GYEW3YMYKiC/TNOihrKncYw36hOTPYW+iKVaJQWOqemeRDSircMIQDT5HOLMWwnUsB41oxibWQFJuQlJ0ssLwwEQgAOWf0tbYuWLQ+KEAxe5klEjIEnPk2MBbhTPEzIGCanGWaWcRiw5BX1Cx++gxJ1Pz4TbqfNKaFEM6Yw4RcC+yMycr45aIvMEJXpZTNRo0zYIM6hqEadMqP8MkvBIPgK46VH0F/jdWB0a87a7HxpEW1z5+ymNQtZgZm7yDoChUP2rIEkhrlThFgsaVbrb30tCuTWoetnT8N1poQ7MyssIULYYbPQdvjfhGejOqPBYDms2Ts2tBhM81p72Jh/4zpj2Dkfc3Z/4/0j52FNc+rHkdsOm2/1XW6aDub8SsecjPmn9hCEDdpPecqk3ePCBzKKHOaa8hdEwnNYhiBu+rVOs9GanrImqrJ77AQ+I+eQoY3vOYDTxo+unMILR/4/73SELlLvGP0n7DLSTl8j01zOHCWeydjaGuZyzS84jmVZzikrwIn3j55MZ2fnKFECiSsUXSFU4be3somrBbg+cI9oGgkJU0DWO8aZm5zEMCqWTH8NsP/gSV+cYkmnYT0Bj0/RiOKHjiKWdJjSYTx8KN1ToOyKGKP38azjah6CsirzDFPzwbMTnwBtVe4B0QLG02uhbMs+hbb98irRLKD8NKE85mL7jF8CpBd0l7LRmH2KSEW6nd/dQrCdj5A3xHvSadcBpt4HyBuyLsNSS0Pv+PZdpuqqhKP7M9D8KnAydYlA3cIRC2Gc32mII335dIKwxeldBLGWfqx0mWjuBY+oLhukJGcpHx23+w6K6uy5MiaJhqG8XDMiJeP8rydg/OqtPsSTyfCWgblw+q0U4FMpJ+hLoeE+8HsCslCO5bnzEphmnF9YKhB1C/xsTRlYvGYxIv0JzqAg5rPSjqVPB892vA2G/uxhpJkbRF4Ac/NcivTwZoJsMT4xuoHU5ZtkzBUO3WepDeK/xtLOxfJJAWP1+y1a8B6G9SdoRqSWHPN9CO3v0kcROSX+YlUJaH+VbKZi50OW4AXlmqnK5vWWdi5MofIbIVDttb6gKHp+SRSR/vgvcT0H430pi5E8LWj/OBplHHr1zKB9CfiqP+pskPXHqPn7OD8YE1d/3m5p52H6iD+FutLFzG+AWfzn9l4TtH8cPb+gSCUvCtqXgH2xU1c2Hy5jEmhtC1BU1h+tJW7QlC9rUI8f5CuJQDZ5Q2efEK6QwllqT7jq/rERZJAoTKUiPwj4gRD+mVb6R9TgbxiCEaqME+Q+HaZIFRXS3peWeBzT/D099IO9QRGYuRSVv02wVhvmTNSMM/D/CqbZ4uYvr8EIWUXi6uTPWTL3YKaqflXgl+7+BNI2T6G/Z4umYXR3bxYu8mPan4rlHWeKWB8fc5LB5FeUEX12WFQaDfeGodwvMP8FNG5+XFP8LJm/g6vyIrJ9d3eegH7it7Sj7b7/GIaxcYOED3T6Y+hFAjX3fMo/i/AgaJGj//4qvtiZZcrxVQXp78BZ1/U/FduWx9Q2/iljrUKFChUqVKhQoUKFChUqVKhQoUKF/w/+A5icKh59XIoCAAAAAElFTkSuQmCC"
                    alt="Logo"
                    class="w-[170px] h-[170px] mx-auto rounded-full object-cover mb-2"
                />
            </div>

            <MainNav :hidden="hide"></MainNav>
            <div class="mt-5" :hidden="hide">
                <div class="flex flex-col text-white text-center">
                    <label for="colorSelect">Dark Mode Settings</label>
                    <!-- <select
                        v-model="selectedColor"
                        id="colorSelect"
                        @change="updateColor"
                        class="bg-white dark:bg-gray-800 p-2 rounded"
                    >
                        <option value="red">Light</option>
                        <option value="dark">Dark</option>
                    </select> -->
                    <button
                        class="border-1 dark:bg-gray-800 p-2 rounded"
                        @click="toggleDark()"
                    >
                    <span v-if="isDark">Light Mode</span>
                    <span v-else>Dark Mode</span>
                    </button>
                </div>
            </div>
        </div>
        <div id="container" class="flex-1 p-3 dark:bg-gray-800 dark:text-white">
            <slot />

        </div>
    </div>
</template>
