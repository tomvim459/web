import React, { useState } from 'react';
import { View, TextInput, Button, Text } from 'react-native';
import client from '../api/client';
import { useAuth } from '../context/AuthContext';

export default function LoginScreen() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');
  const { login } = useAuth();

  const handleLogin = async () => {
    try {
      const { data } = await client.post('api/login', { email, password });
      login(data);
    } catch {
      setError('Login failed');
    }
  };

  return (
    <View style={{ flex: 1, justifyContent: 'center', padding: 16 }}>
      <TextInput placeholder="Email" value={email} onChangeText={setEmail} style={{ borderWidth: 1, marginBottom: 8, padding: 8 }} />
      <TextInput placeholder="Password" secureTextEntry value={password} onChangeText={setPassword} style={{ borderWidth: 1, marginBottom: 8, padding: 8 }} />
      {!!error && <Text style={{ color: 'red', marginBottom: 8 }}>{error}</Text>}
      <Button title="Login" onPress={handleLogin} />
    </View>
  );
}
