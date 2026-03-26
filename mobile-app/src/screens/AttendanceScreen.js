import React from 'react';
import { View, Button } from 'react-native';
import client from '../api/client';
import { useAuth } from '../context/AuthContext';

export default function AttendanceScreen() {
  const { token } = useAuth();
  return (
    <View style={{ flex: 1, justifyContent: 'center', padding: 16 }}>
      <Button title="Check In" onPress={() => client.post('api/attendance/check-in', {}, { headers: { 'X-USER-ID': token } })} />
      <View style={{ height: 12 }} />
      <Button title="Check Out" onPress={() => client.post('api/attendance/check-out', {}, { headers: { 'X-USER-ID': token } })} />
    </View>
  );
}
