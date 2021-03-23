import 'dart:async';
import 'dart:math';

import 'package:flutter/material.dart';
import 'dart:ui';

void main() => runApp(Sanctum());

class Sanctum extends StatefulWidget {
  @override
  _SanctumState createState() => _SanctumState();
}

class _SanctumState extends State<Sanctum> {
  var score = 0;
  int totalBox = (window.physicalSize.height.round() / 75).round() * 20;
  static List<int> snakePosition = [28, 48, 68, 88, 108];
  static var randomNumber = Random();
  var food = randomNumber.nextInt(500);
  var started = false;
  //global variable declaration

  //new food for snake
  void generateFood() {
    food = randomNumber.nextInt(totalBox);
    if (snakePosition.contains(food)) {
      generateFood();
    }
  }

  //To check if snake ate its own tail
  bool gameOver() {
    for (int i = 0; i < snakePosition.length; i++) {
      int count = 0;
      for (int j = 0; j < snakePosition.length; j++) {
        if (snakePosition[i] == snakePosition[j]) count++;
      }
      if (count == 2) return true;
    }
    return false;
  }

  //game finish message
  void _showEndMessage() {
    print('Game Over!!!');
    // showDialog(
    //     context: context,
    //     builder: (BuildContext context) {
    //       print('function called to end.');
    //       return AlertDialog(
    //         title: Text("Game Over" + score.toString()),
    //         content: Text("Game Over" + score.toString()),
    //         actions: <Widget>[
    //           FlatButton(
    //             onPressed: () {
    //               startGame();
    //             },
    //             child: Text('Restart'),
    //           ),
    //         ],
    //       );
    //     });
  }

  //start game
  void startGame() {
    started = true;
    snakePosition = [28, 48, 68, 88, 108];
    const duration = const Duration(milliseconds: 300);
    Timer.periodic(duration, (Timer timer) {
      updateSnake();
      if (gameOver()) {
        timer.cancel();
        _showEndMessage();
      }
    });
  }

  var direction = 'down';
  void updateSnake() {
    setState(() {
      switch (direction) {
        case 'down':
          if (snakePosition.last > totalBox - 20) {
            snakePosition.add(snakePosition.last + 20 - totalBox);
          } else {
            snakePosition.add(snakePosition.last + 20);
          }
          break;

        case 'up':
          if (snakePosition.last < 20) {
            snakePosition.add(snakePosition.last - 20 + totalBox);
          } else {
            snakePosition.add(snakePosition.last - 20);
          }
          break;

        case 'left':
          if (snakePosition.last % 20 == 0) {
            snakePosition.add(snakePosition.last - 1 + 20);
          } else {
            snakePosition.add(snakePosition.last - 1);
          }
          break;

        case 'right':
          if ((snakePosition.last + 1) % 20 == 0) {
            snakePosition.add(snakePosition.last + 1 - 20);
          } else {
            snakePosition.add(snakePosition.last + 1);
          }
          break;

        default:
      }

      if (snakePosition.last == food) {
        generateFood();
        setState(() {
          score = score + 10;
        });
      } else {
        snakePosition.removeAt(0);
      }
    });
  }

  @override
  Widget build(BuildContext context) {
    // managed
    //calling start game for testing only
    //variables
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      theme: ThemeData.dark(),
      home: Scaffold(
        appBar: AppBar(
          backgroundColor: Colors.black,
          title: Center(
            child: Text(
              'S n a k e',
              style: TextStyle(color: Colors.tealAccent, fontSize: 25),
            ),
          ),
        ),
        backgroundColor: Colors.black,
        body: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            Expanded(
              child: Container(
                color: Colors.black,
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  crossAxisAlignment: CrossAxisAlignment.center,
                  children: <Widget>[
                    Row(
                      children: <Widget>[
                        Padding(
                          padding: const EdgeInsets.only(
                              right: 10.0, bottom: 10.0, top: 10.0),
                          child: Column(
                            children: <Widget>[
                              Text(
                                "score : ",
                                style: TextStyle(
                                    fontSize: 18, fontWeight: FontWeight.bold),
                              ),
                            ],
                          ),
                        ),
                        Padding(
                          padding: const EdgeInsets.only(
                              right: 10.0, bottom: 10.0, top: 10.0),
                          child: Column(
                            children: <Widget>[
                              Text(
                                score.toString(),
                                style: TextStyle(
                                    fontSize: 18, fontWeight: FontWeight.bold),
                              ),
                            ],
                          ),
                        ),
                      ],
                    ),
                  ],
                ),
              ),
            ),
            Expanded(
              flex: 6,
              child: GestureDetector(
                onVerticalDragUpdate: (details) {
                  if (direction != 'up' && details.delta.dy > 0) {
                    direction = 'down';
                  } else if (direction != 'down' && details.delta.dy < 0) {
                    direction = 'up';
                  }
                },
                onHorizontalDragUpdate: (details) {
                  if (direction != 'left' && details.delta.dx > 0) {
                    direction = 'right';
                  } else if (direction != 'right' && details.delta.dx < 0) {
                    direction = 'left';
                  }
                },
                child: Container(
                  color: Colors.black,
                  child: GridView.builder(
                    physics: NeverScrollableScrollPhysics(),
                    itemCount: totalBox,
                    gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(
                        crossAxisCount: 20,
                        crossAxisSpacing: 2.5,
                        childAspectRatio: 1),
                    // ignore: missing_return
                    itemBuilder: (BuildContext contex, int index) {
                      if (snakePosition.last == index) {
                        return Center(
                          child: Container(
                            padding: EdgeInsets.all(1),
                            child: ClipRRect(
                              borderRadius: BorderRadius.circular(3.0),
                              child: Container(color: Colors.red),
                            ),
                          ),
                        );
                      } else if (snakePosition.contains(index)) {
                        return Center(
                          child: Container(
                            padding: EdgeInsets.all(1),
                            child: ClipRRect(
                              borderRadius: BorderRadius.circular(3.0),
                              child: Container(
                                color: Colors.white,
                              ),
                            ),
                          ),
                        );
                      } else if (index == food) {
                        return Center(
                          child: Container(
                            padding: EdgeInsets.all(1),
                            child: ClipRRect(
                              borderRadius: BorderRadius.circular(3.0),
                              child: Container(color: Colors.green),
                            ),
                          ),
                        );
                      } else {
                        return Center(
                          child: Container(
                            padding: EdgeInsets.all(1),
                            child: ClipRRect(
                              borderRadius: BorderRadius.circular(3.0),
                              child: Container(color: Colors.white12),
                            ),
                          ),
                        );
                      }
                    },
                  ),
                ),
              ),
            ),
            Expanded(
              child: Container(
                color: Colors.black,
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  crossAxisAlignment: CrossAxisAlignment.center,
                  children: <Widget>[
                    Row(
                      children: <Widget>[
                        Padding(
                          padding: const EdgeInsets.only(
                              right: 10.0, bottom: 10.0, top: 10.0),
                          child: Column(
                            children: <Widget>[
                              OutlineButton(
                                textColor: Colors.tealAccent,
                                onPressed: () {
                                  return {if (started == false) startGame()};
                                },
                                child: Text('Play'),
                              ),
                            ],
                          ),
                        ),
                      ],
                    ),
                  ],
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
