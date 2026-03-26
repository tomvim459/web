import React from 'react';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
import LoginScreen from '../screens/LoginScreen';
import LeaveScreen from '../screens/LeaveScreen';
import AttendanceScreen from '../screens/AttendanceScreen';
import CalendarScreen from '../screens/CalendarScreen';
import { useAuth } from '../context/AuthContext';

const Stack = createNativeStackNavigator();
const Tabs = createBottomTabNavigator();

function MainTabs() {
  return (
    <Tabs.Navigator>
      <Tabs.Screen name="Leaves" component={LeaveScreen} />
      <Tabs.Screen name="Attendance" component={AttendanceScreen} />
      <Tabs.Screen name="Calendar" component={CalendarScreen} />
    </Tabs.Navigator>
  );
}

export default function AppNavigator() {
  const { user } = useAuth();
  return (
    <Stack.Navigator screenOptions={{ headerShown: false }}>
      {user ? <Stack.Screen name="Main" component={MainTabs} /> : <Stack.Screen name="Login" component={LoginScreen} />}
    </Stack.Navigator>
  );
}
