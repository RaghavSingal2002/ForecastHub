<template>
    <div :style="containerStyle">
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h1>🌤 Weather App</h1>

            <!-- Dark Mode Toggle -->
            <button @click="toggleDarkMode">
                {{ darkMode ? '☀ Light Mode' : '🌙 Dark Mode' }}
            </button>
        </div>

        <!-- Search + Auto Detect -->
        <div style="margin:20px 0;">
            <input
                v-model="location"
                placeholder="Enter city name"
                style="padding:8px; width:200px;"
                @keyup.enter="fetchWeather"
            />
            <button @click="fetchWeather">Search</button>
            <button @click="detectLocation" style="margin-left:10px;">
                📍 Use My Location
            </button>
        </div>

        <div v-if="loading">Loading...</div>
        <div v-if="error" style="color:red;">{{ error }}</div>

        <!-- Current Weather -->
        <div v-if="weather">
            <h2>{{ weather.location.name }}, {{ weather.location.country }}</h2>
            <h3>{{ weather.current.temp_c }}°C</h3>
            <p>{{ weather.current.condition.text }}</p>
            <img :src="weather.current.condition.icon" />

            <!-- 7-Day Forecast -->
            <div v-if="weather.forecast" style="margin-top:30px;">
                <h3>7-Day Forecast</h3>
                <div style="display:flex; flex-wrap:wrap; gap:15px;">
                    <div
                        v-for="day in weather.forecast.forecastday"
                        :key="day.date"
                        style="border:1px solid #ccc; padding:10px; width:120px; border-radius:8px;"
                    >
                        <strong>{{ day.date }}</strong>
                        <div>{{ day.day.maxtemp_c }}° / {{ day.day.mintemp_c }}°</div>
                        <img :src="day.day.condition.icon" width="40" />
                        <div style="font-size:12px;">
                            {{ day.day.condition.text }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Searches -->
        <div v-if="recent.length" style="margin-top:30px;">
            <h3>Recent Searches</h3>
            <ul>
                <li
                    v-for="item in recent"
                    :key="item.id"
                    @click="searchFromHistory(item.location)"
                    style="cursor:pointer; color:blue;"
                >
                    {{ item.location }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            location: '',
            weather: null,
            loading: false,
            error: null,
            recent: [],
            darkMode: false
        }
    },

    computed: {
        containerStyle() {
            return {
                padding: '40px',
                fontFamily: 'Arial',
                backgroundColor: this.darkMode ? '#1e1e1e' : '#ffffff',
                color: this.darkMode ? '#ffffff' : '#000000',
                minHeight: '100vh'
            }
        }
    },

    mounted() {
        this.loadHistory()
    },

    methods: {

        toggleDarkMode() {
            this.darkMode = !this.darkMode
        },

        async fetchWeather() {
            if (!this.location) {
                this.error = "Please enter a city"
                return
            }

            this.loading = true
            this.error = null

            try {
                const response = await axios.get(`/api/weather?q=${this.location}`)

                if (response.data.success) {
                    this.weather = response.data.data
                    this.loadHistory()
                } else {
                    this.error = response.data.error
                }

            } catch {
                this.error = "Failed to fetch weather"
            } finally {
                this.loading = false
            }
        },

        async loadHistory() {
            try {
                const res = await axios.get('/api/history')
                this.recent = res.data
            } catch (e) {
                console.error("History load failed")
            }
        },

        searchFromHistory(city) {
            this.location = city
            this.fetchWeather()
        },

        detectLocation() {
            if (!navigator.geolocation) {
                this.error = "Geolocation not supported"
                return
            }

            navigator.geolocation.getCurrentPosition(
                async (position) => {
                    const lat = position.coords.latitude
                    const lon = position.coords.longitude
                    this.location = `${lat},${lon}`
                    this.fetchWeather()
                },
                () => {
                    this.error = "Location permission denied"
                }
            )
        }
    }
}
</script>
