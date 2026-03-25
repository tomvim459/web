import React, { useEffect, useState } from 'react';
import { View, TextInput, Button, Text, FlatList } from 'react-native';
import client from '../api/client';
import { useAuth } from '../context/AuthContext';

export default function LeaveScreen() {
  const { token } = useAuth();
  const [leaves, setLeaves] = useState([]);
  const [startDate, setStartDate] = useState('');
  const [endDate, setEndDate] = useState('');
  const [reason, setReason] = useState('');

  const loadLeaves = async () => {
    const { data } = await client.get('api/leaves', { headers: { 'X-USER-ID': token } });
    setLeaves(data.leaves);
  };

  const applyLeave = async () => {
    await client.post('api/leaves/apply', { start_date: startDate, end_date: endDate, reason }, { headers: { 'X-USER-ID': token } });
    setStartDate(''); setEndDate(''); setReason('');
    loadLeaves();
  };

  useEffect(() => { loadLeaves(); }, []);

  return (
    <View style={{ flex: 1, padding: 16 }}>
      <Text style={{ fontSize: 18, fontWeight: '600' }}>Apply Leave</Text>
      <TextInput placeholder="Start Date (YYYY-MM-DD)" value={startDate} onChangeText={setStartDate} style={{ borderWidth: 1, marginVertical: 6, padding: 8 }} />
      <TextInput placeholder="End Date (YYYY-MM-DD)" value={endDate} onChangeText={setEndDate} style={{ borderWidth: 1, marginVertical: 6, padding: 8 }} />
      <TextInput placeholder="Reason" value={reason} onChangeText={setReason} style={{ borderWidth: 1, marginVertical: 6, padding: 8 }} />
      <Button title="Submit" onPress={applyLeave} />
      <FlatList data={leaves} keyExtractor={(item) => String(item.id)} renderItem={({ item }) => <Text>{item.start_date} - {item.end_date} ({item.status})</Text>} />
    </View>
  );
}
