<template>
  <div id="app" :class="{ 'success-background': successMessage }">
    <h2 v-if="!successMessage">Registration Form</h2>
    <form @submit.prevent="submitForm" :class="{ 'hidden-form': successMessage }">
      <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" id="firstName" v-model="firstName" required>
      </div>
      <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" id="lastName" v-model="lastName" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" v-model="email" required>
      </div>
      <button type="submit">Submit</button>
    </form>
    <div v-if="errorMessage" class="message error-message">{{ errorMessage }}</div>
    <div v-if="successMessage" class="message success-message">{{ successMessage }}</div>
  </div>
</template>

<script>
import axios from 'axios';
console.log('process.env.VUE_APP_API_URL', process.env.VUE_APP_API_URL);
export default {
  data () {
    return {
      firstName: '',
      lastName: '',
      email: '',
      successMessage: '',
      errorMessage: ''
    };
  },
  methods: {
    async submitForm () {
      try {
        const response = await axios.post(process.env.VUE_APP_API_URL, {
          firstName: this.firstName,
          lastName: this.lastName,
          email: this.email
        });

        this.errorMessage = '';
        this.successMessage = '';

        if (response.data.status === 'success') {
          this.successMessage = response.data.message;
          document.body.classList.add('success-background');

          setTimeout(() => {
            location.reload();
          }, 5000);
        } else {
          this.errorMessage = response.data.message;
        }
      } catch (error) {
        this.errorMessage = 'Failed to submit the form.';
      }
    }
  }
};
</script>

<style>
#app {
  font-family: 'Roboto', sans-serif;
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  background-color: #f9f9f9;
  transition: background-color 0.5s ease-in-out;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
  color: #333;
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
  color: #555;
}

input[type="text"],
input[type="email"] {
  width: calc(100% - 18px);
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
  transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="email"]:focus {
  outline: none;
  border-color: #3498db;
}

button {
  padding: 12px 24px;
  font-size: 16px;
  background-color: #3498db;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #2980b9;
}

.success-message {
  margin-top: 15px;
  color: #2ecc71;
}

.error-message {
  margin-top: 15px;
  color: #e74c3c;
}

.success-background {
  background-color: #559b72;
}

.hidden-form {
  display: none;
}

.message {
  margin-top: 20px;
  padding: 10px 15px;
  border-radius: 5px;
  text-align: center;
  font-weight: bold;
  width: 100%;
}
</style>