/**
 * Author: Alex Yang Gao
 * Email: [removed]
 * Type: Java
 * Description: This algorithm employs the Reinforcement Learning algorithm (RL) to
 * learn the best action in different situations (lambda values).
 * All rights reserved by Alex Gao.
 */

package strategy;

import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;

import util.GameSettings;
import util.Lambda;
import util.Response;

public class RLQTableI extends Strategy {

  private static double[][] Qtable = new double[105][2];
  private int LastState;
  private int LastAction;
  private int CurrentState;
  private int CurrentAction;
  private double ExplorePercentage;
  private static int Counter;
  private static double LastLambda;
  private static double CoopRatio = 0.3;

  public RLQTableI() {
    super();
    lambda = new Lambda(CoopRatio);
    initialQ();
    Counter = 0;
    ExplorePercentage = 5;
    LastLambda = CoopRatio;
  }

  @Override
  public Response respond() {

    Response FinalAnswer;
    Response OppLast, MyLast;

    Counter += 1;

    // First round
    if (getRoundsPlayed() == 0) {
      lambda.noChange();
      LastState = (int) (lambda.getValue() * 100);
      LastAction = 0;
      LastLambda = lambda.getValue();
      return Response.C;
    } else {
      OppLast = getLastResponsePair().get(1);
      MyLast = getLastResponsePair().get(0);

      if (MyLast == Response.C && OppLast == Response.C) lambda.decrementValue();
      else if (MyLast == Response.C && OppLast == Response.D) lambda.incrementValue();
      else if (MyLast == Response.D && OppLast == Response.C) lambda.decrementValue();
      else if (MyLast == Response.D && OppLast == Response.D) lambda.incrementValue();

      CurrentState = (int) (lambda.getValue() * 100);
      FinalAnswer = learningResult(OppLast);
      LastLambda = lambda.getValue();

      return FinalAnswer;
    }
  }

  public Response learningResult(Response OppLastState) {
    double Reward;
    int OppLast;

    // Get opponent's last action
    if (OppLastState == Response.C) OppLast = 0;
    else OppLast = 1;

    Reward = getReward(OppLast);
    CurrentAction = getBestAction(CurrentState);
    Qtable[LastState][LastAction] += 0.1 * (Reward + 0.9 * (Qtable[CurrentState][CurrentAction] - Qtable[LastState][LastAction]));

    LastState = CurrentState;
    LastAction = CurrentAction;

    if (CurrentAction == 0) return Response.C;
    else return Response.D;
  }

  public int getBestAction(int state) {
    ExplorePercentage = -(5.0 / GameSettings.N) * Counter + 5;

    if (rand.nextInt(100) < ExplorePercentage) {
      return rand.nextInt(2);
    } else {
      if (Qtable[state][0] >= Qtable[state][1]) return 0;
      else return 1;
    }
  }

  public double getReward(int OppLast) {
    double Vlambda = LastLambda;

    //both cooperate
    if (LastAction == 0 && OppLast == 0) {
      return 3 * (1 - Vlambda) + 2.5 * Vlambda;
    } else if (LastAction == 0 && OppLast == 1) {
      return 2.5 * Vlambda;
    } else if (LastAction == 1 && OppLast == 0) {
      return 5 * (1 - Vlambda);
    } else {
      return 1 - Vlambda;
    }
  }

  public static void initialQ() {
    for (int i = 0; i <= 100; ++i) {
      double lambda = i / 100.0;

      Qtable[i][0] = CoopRatio * (3 * (1 - lambda) + 2.5 * lambda) + (1 - CoopRatio) * (2.5 * lambda);
      Qtable[i][1] = CoopRatio * (5 * (1 - lambda)) + (1 - CoopRatio) * (lambda);
    }
  }

  public void printQtable() {
    try {
      FileWriter file = new FileWriter("Qtable.txt");
      BufferedWriter writer = new BufferedWriter(file);
      for (int i = 0; i <= 100; i++) {
        writer.append(Qtable[i][0] + "\n" + Qtable[i][1] + "\n");
      }
      writer.close();
    } catch (IOException e) {
      System.out.println(e.getMessage());
    }
  }

  @Override
  public String name() {
    return "RL QTable I";
  }

  @Override
  public String author() {
    return "Alex Gao";
  }
}
