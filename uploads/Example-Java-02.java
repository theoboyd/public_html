package strategy;

import util.Lambda;
import util.NashEquilibrium;
import util.Response;

public class NashTitForTat extends Strategy {

  public NashTitForTat() {
    super();
    lambda = new Lambda(rand.nextDouble());
  }

  @Override
  public Response respond() {
    if (getRoundsPlayed() == 0) {
      // First round
      return Response.C;
    } else {
      // Not the first round
      if (getLastResponsePair().get(1) == Response.C) {
        // If the opponent last cooperated
        lambda.incrementValue();
        return NashEquilibrium.getEquilibrium(lambda);
      } else {
        // The opponent last defected
        lambda.decrementValue();
        return NashEquilibrium.getEquilibrium(lambda);
      }
    }
  }

  @Override
  public String name() {
    return "Nash Tit For Tat";
  }

  @Override
  public String author() {
    return "FirstName LastName";
    // Contact email: EmailAddress
  }

}
