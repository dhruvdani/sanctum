import 'package:flutter/material.dart';

import 'gameTetris/mainTetris.dart';
import 'package:provider/provider.dart';
import 'gameTicTacToe-PvP/main.dart';
import 'gameSnake/mainSnake.dart';
import 'gameMemory/Memory.dart';

void main() => runApp(Sanctum());

class Sanctum extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    //for snake
    //return Snake();
    //For Tetris
    // return ChangeNotifierProvider(
    //   create: (context) => Data(),
    //   child: Tetris(),
    // );
    // for memory
    return Memory();
    // for tic tac toe
    //return TicTacToe();
  }
}
