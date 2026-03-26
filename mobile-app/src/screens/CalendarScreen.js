import React, { useEffect, useState } from 'react';
import { View, Text, FlatList } from 'react-native';
import client from '../api/client';
import { useAuth } from '../context/AuthContext';

export default function CalendarScreen() {
  const { token } = useAuth();
  const [items, setItems] = useState([]);

  useEffect(() => {
    client.get('api/calendar', { headers: { 'X-USER-ID': token } }).then(({ data }) => {
      const attendance = data.attendance.map((a) => ({ key: `a-${a.id}`, label: `${a.date} - Present` }));
      const holidays = data.holidays.map((h) => ({ key: `h-${h.id}`, label: `${h.holiday_date} - Holiday (${h.name})` }));
      setItems([...attendance, ...holidays]);
    });
  }, []);

  return <View style={{ flex: 1, padding: 16 }}><FlatList data={items} renderItem={({ item }) => <Text>{item.label}</Text>} /></View>;
}
