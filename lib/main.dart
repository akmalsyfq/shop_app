import 'package:flutter/material.dart';
import 'package:shop/splashpage.dart';

void main() => runApp(const MyApp());

class MyApp extends StatefulWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  State<MyApp> createState() => _MyAppState();
}

class _MyAppState extends State<MyApp> {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
        theme: ThemeData(
          primarySwatch: Colors.pink,
          appBarTheme: const AppBarTheme(color: Color(0xfff06292)),
        ),
        title: 'Bella Cosa',
        home: const Scaffold(
          body: SplashPage(),
        ));
  }
}
